<?php

namespace App\Controller;

use App\Form\MakeType;
use App\Repository\MakeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\BalanceSheet;

#[Route('/trial_balance_work')]
class TrialBalanceWorkController extends AbstractController
{
    
/* --------------------------------- */

    public function editFormAction(Request $request, $cs_id, $trial_balance_work_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');


        //
        // get Trial Balance Work entity
        //
        $trial_balance_work = $em->find('ItbEaccountingBundle:TrialBalanceWork', $trial_balance_work_id);

        //
        // (1) get TAcount        
        //
        $t_account = $trial_balance_work->getTAccount();
        
        //
        // put default FORM data into variable
        //
        $debit_or_credit = 'net_debit';
        $debit_or_credit_integer = $trial_balance_work->getNetDebit();
        if( 0 == $debit_or_credit_integer)
            $debit_or_credit = 'net_credit';
        
        $defaultData = array(
            'balance' => $trial_balance_work->getBalance(),
            'debit_or_credit' => $debit_or_credit,
        );

//var_dump($defaultData ); die;        
        
        // 
        // create FORM for use by template
        //
        $form = $this->createFormBuilder($defaultData)
                ->add('balance', 'text')
                ->add('debit_or_credit', 'choice', 
                        array( 
                            'choices' => array(
                                'net_debit' => 'Net Debit',
                                'net_credit' => 'Net Credit',
                            )
                        )
                  )
                ->getForm()
        ;
        
        

        //
        // process data, if form has POSTED data after a submit ...
        //
        if('POST' == $request->getMethod())
        {
            $form->bindRequest($request);
            if($form->isValid())
            {
                // 
                // extract net debit and credit from the form
                // 
                $data = $form->getData();
                $balance = $data['balance'];
                $debit_or_credit = $data['debit_or_credit'];
                
                $net_debit = 1;
                if( 'net_credit' == $debit_or_credit)
                    $net_debit = 0;
                        
                //
                // update new record and insert into DB
                //
                $trial_balance_work = $em->find('ItbEaccountingBundle:TrialBalanceWork', $trial_balance_work_id);
                $trial_balance_work  -> setBalance( $balance );
                $trial_balance_work  -> setNetDebit( $net_debit );

                $em->persist($trial_balance_work);
                $em->flush();

                //
                // BUILD params and render template
                //
                $params = array(
                    'cs_id' => $cs_id,
                );

                // then redirect to list 
                $url = $this->generateUrl('ItbEaccountingBundle_trial_balance_work', $params);
                return $this->redirect($url);
                
            }
        }


        //
        // BUILD params and render template
        //
        $params = array(
            'cs_id' => $cs_id,
            'account' => $t_account,
            'trial_balance_work' => $trial_balance_work,
            'form' => $form->createView(),
        );
        
        return $this->render('ItbEaccountingBundle:TrialBalanceWork:editForm.html.twig', $params);
    }    
    
    
    
/* --------------------------------- */
    public function createFormAction(Request $request, $cs_id, $account_id)
    {        
        $defaultData = array(
            'balance' => 0,
            'debit_or_credit' => 'net_debit',
        );
        
        // 
        // create FORM for use by template
        //
        $form = $this->createFormBuilder($defaultData)
                ->add('balance', 'text')
                ->add('debit_or_credit', 'choice', 
                        array( 
                            'choices' => array(
                                'net_debit' => 'Net Debit',
                                'net_credit' => 'Net Credit',
                            )
                        )
                  )
                ->getForm()
        ;
        
        $em = $this->get('doctrine.orm.entity_manager');

/*
        //
        // (1) get TAcount        
        //
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'ta')
            ->add('from', 'ItbEaccountingBundle:TAccount ta')
            ->add('where', 'ta.id = :account_id')
            ->setParameters(array(
                'account_id' => $account_id,
            ));

        $query = $qb->getQuery();
        $account = $query->getSingleResult();

*/        
        $account = $em->find('ItbEaccountingBundle:TAccount', $account_id);
        
        if('POST' == $request->getMethod())
        {
            $form->bindRequest($request);
            if($form->isValid())
            {
                // 
                // extract net debit and credit from the form
                // 
                $data = $form->getData();
                $balance = $data['balance'];
                $debit_or_credit = $data['debit_or_credit'];
                
                $net_debit = 1;
                if( 'net_credit' == $debit_or_credit)
                    $net_debit = 0;
                
                //
                // get user - for id to retrieve WORK entities
                //
                $sf_user = $this->get('security.context')->getToken()->getUser();
                $user_id = $sf_user->getUsername();

                $user = $em->find('ItbEaccountingBundle:User', $user_id);


                //
                // create new record and insert into DB
                //
                $trial_balance_work = new TrialBalanceWork;
                $trial_balance_work  -> setUser( $user );
                $trial_balance_work  -> setTAccount( $account );
                $trial_balance_work  -> setBalance( $balance );
                $trial_balance_work  -> setNetDebit( $net_debit );

                $em->persist($trial_balance_work);
                $em->flush();

                //
                // BUILD params and render template
                //
                $params = array(
                    'cs_id' => $cs_id,
                );

                // then redirect to list 
                $url = $this->generateUrl('ItbEaccountingBundle_trial_balance_work', $params);
                return $this->redirect($url);            

            }


        }
        
        //
        // BUILD params and render template
        //
        $params = array(
            'cs_id' => $cs_id,
            'account' => $account,
            'form' => $form->createView(),
        );
        
        return $this->render('ItbEaccountingBundle:TrialBalanceWork:createForm.html.twig', $params);
    }

    
/* --------------------------------- */
    public function displayAccountAction($cs_id, $account_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        //
        // get case study (for testing colour coding for hints)
        //
        $case_study = $em->find('ItbEaccountingBundle:CaseStudy', $cs_id);

        //
        // get user - for id to retrieve WORK entities
        //
        $sf_user = $this->get('security.context')->getToken()->getUser();
        $user_id = $sf_user->getUsername();

        
        //
        // (1) get TAcount        
        //
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'ta')
            ->add('from', 'ItbEaccountingBundle:TAccount ta')
            ->add('where', 'ta.id = :account_id')
            ->setParameters(array(
                'account_id' => $account_id,
            ));

        $query = $qb->getQuery();
        $account = $query->getSingleResult();
        
        //
        // (2) get entity for work record for TAcount and user id
        //
        $repository = $this->getDoctrine()->getRepository('ItbEaccountingBundle:TrialBalanceWork');
        $work = $repository->findOneBy(
            array(
                'user' => $user_id,
                'tAccount' => $account_id,
            )
        );
        
        //
        // (3) find corresponding ANSWER entity for this TAccount
        //
        $answer = null;

        $repository = $this->getDoctrine()->getRepository('ItbEaccountingBundle:TrialBalanceAnswers');
        $answer = $repository->findOneBy(
            array(
                'tAccount' => $account_id,
            )
        );

        $debit_total = $em->getRepository('ItbEaccountingBundle:TAccount')->getDebitTotalForUserTAccount($user_id, $account_id);
        $credit_total = $em->getRepository('ItbEaccountingBundle:TAccount')->getCreditTotalForUserTAccount($user_id, $account_id);
        
        //
        // (4) get entity for USER BALANCE record for TAcount and user id
        //
        $repository = $this->getDoctrine()->getRepository('ItbEaccountingBundle:UserAccountBalance');
        $user_balance = $repository->findOneBy(
            array(
                'user' => $user_id,
                'tAccount' => $account_id,
            )
        );
        

        //
        // BUILD params and render template
        //
        $params = array(
            'cs_id' => $cs_id,
            'account' => $account,
            'work' => $work,
            'answer' => $answer,
            'case_study' => $case_study,
            'user_balance' => $user_balance,
            'debit_total' => $debit_total,
            'credit_total' => $credit_total,
        );
        
        return $this->render('ItbEaccountingBundle:TrialBalanceWork:displayAccount.html.twig', $params);
    }
	
	    
/* --------------------------------- */
    public function listAction($cs_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        //
    	// declare a global object "matt" for the Twig template(s)
        $twig = $this->get('twig');  		
        $twig->addGlobal('correct_totals', new Matt() );    
        $twig->addGlobal('totals', new Matt() );    
        $twig->addGlobal('nets', new Matt() );    
        $twig->addGlobal('correct_nets', new Matt() );    

//
// get all ledgers for this case study 
//
$ledgers = $em->getRepository('ItbEaccountingBundle:Ledger')->findBy(
    array(  
        'caseStydy' => $cs_id, 
    )
);
        
/*        
        //
        // (1) get entity for current case study
        //
        $caseStudy = $em->getRepository('ItbEaccountingBundle:CaseStudy')->findOneById($cs_id);

        //
        // (2) get ledger entity (corresponding to Nominal Ledger for this case study)
        //
        $nominal_ledger = $em->getRepository('ItbEaccountingBundle:Ledger')->findBy(
            array(
                'name' => 'Nominal Ledger',
                'caseStydy' => $cs_id,
            )
        );
*/
        
        
/* ------ NEW CODE 
        if( !$nominal_ledger) {
            $accounts = NULL;
        }
        else {
            $accounts = $em->getRepository('ItbEaccountingBundle:TAccount')->findBy(
                array(
                    'ledger' => $nominal_ledger,
                )
            );
        }        
        

 */        
        
/*   -------- old code
 * 
 */  
/*        //
        // (3) get all TAccount entities for this nominal ledger
        //
        $qb = $em->createQueryBuilder();

        $qb->add('select', 'ta')
            ->add('from', 'ItbEaccountingBundle:TAccount ta')
            ->add('orderBy', 'ta.accNumber ASC');

        $query = $qb->getQuery();
        $accounts = $query->getResult();
*/

        
/* 
        // id of the nominal ledger for this case study
        $ledger_id = $ledger->getId();

         // loop through all ledgers for this CS to find ones with no parent
        foreach( $all_accounts as $account)
        {
                $account_ledger = $account -> getLedger();
                $account_ledger_id = $account_ledger -> getId();

                if( ($ledger_id == $account_ledger_id) )
                {
                        // append this ledger to the ledgers array
                        $accounts[] = $account;	
                }
        }
*/ 
        

//            'case_study' => $caseStudy,
//            'accounts' => $accounts

        $params = array(
            'cs_id' => $cs_id, 
            'ledgers' => $ledgers
        );
        return $this->render('ItbEaccountingBundle:TrialBalanceWork:list.html.twig', $params);

    }


  

    
/* --------------------------------- */
    public function listAccountsAction($cs_id, $ledger)
    {
        // get entity manager
        $em = $this->get('doctrine.orm.entity_manager');
        
        // get ID of given ledger
        $ledger_id = $ledger->getId();
        
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'ta')
            ->add('from', 'ItbEaccountingBundle:TAccount ta')
            ->add('orderBy', 'ta.accNumber ASC')
            ->add('where', 'ta.ledger = ?1')
            ->setParameter(1, $ledger_id);   
            
        $query = $qb->getQuery();
        $accounts = $query->getResult();
        
        $params = array(
            'cs_id' => $cs_id, 
            'accounts' => $accounts, 
            'ledger' => $ledger,
        );
        
        return $this->render('ItbEaccountingBundle:TrialBalanceWork:listAccounts.html.twig', $params);
    }
}

