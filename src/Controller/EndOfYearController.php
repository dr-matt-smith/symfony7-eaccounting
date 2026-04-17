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

#[Route('/end_of_year')]
class EndOfYearController extends AbstractController
{
	

/* -------------------------------- */
    public function editFormAction(Request $request, $cs_id, $adjustment_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $adjustment = $em->find('ItbEaccountingBundle:EoyAdjustment', $adjustment_id);

        // get ID of current user
        $sf_user = $this->get('security.context')->getToken()->getUser();
        $user_id = $sf_user->getUsername();
        $user = $em->find('ItbEaccountingBundle:User', $user_id);
        
        //
        // get all ledgers for this case study 
        //
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'ta')
            ->add('from', 'ItbEaccountingBundle:TAccount ta')
            ->add('orderBy', 'ta.accNumber ASC')
        ;

        $query = $qb->getQuery();
        $accounts = $query->getResult();
        $accountsAll = $accounts;

        /*
        $ledgers = $em->getRepository('ItbEaccountingBundle:Ledger')->findBy(
            array(
             'caseStydy' => $cs_id, 
            )
        );  

        $accountsAll = array();
        foreach($ledgers as $ledger)
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
          
            if( null == $accountsAll)
                $accountsAll = $accounts;
            else
                $accountsAll = array_merge( $accountsAll, $accounts);
        }
*/
        
          
        
        //
        // build up array for account choice
        //
        $accountsMenuArray = array();
        foreach($accountsAll as $account) {
            $id = $account->getId();
            $idString = "$id";
            $accNumber = $account->getAccNumber();
            $accName = $account->getAccName();
            $numberAndName = "$accNumber $accName";
            $accountsMenuArray[ $idString ] = $numberAndName; 
        }

        $menuItemFirst = array();
        $menuItemFirst['0'] = '(no account selected)';
        $accountsMenuArray = array_merge( $menuItemFirst, $accountsMenuArray);

        //
        // retreive any existing record for this user / adjustment
        //

        // (1) try to retrieve existing record
        $eoy_adj_work = $em->getRepository('ItbEaccountingBundle:EoyAdjWork')->findOneBy(
            array(
                'adjustment' => $adjustment_id,
                'user' => $user_id, 
            )
        ); 

        // (2) if null, create new record
        if( NULL == $eoy_adj_work){
            $eoy_adj_work = new EoyAdjWork();
            $eoy_adj_work  -> setUser( $user );
            $eoy_adj_work ->setAdjustment($adjustment);
            $eoy_adj_work ->setDebitAmount(0);
            $eoy_adj_work ->setCreditAmount(0);
            $eoy_adj_work ->setDebitTAccount(NULL);
            $eoy_adj_work ->setCreditTAccount(NULL);
        }        
        
        
        $defaultDebitTAccountID = null;
        $defaultCreditTAccountID = null;
        if( $eoy_adj_work ->getDebitTAccount() )
            $defaultDebitTAccountID = $eoy_adj_work ->getDebitTAccount() -> getId();
        if( $eoy_adj_work ->getCreditTAccount() )
            $defaultCreditTAccountID = $eoy_adj_work ->getCreditTAccount() -> getId();

        // set up default form data
        //
        $defaultData = array(
                'debit_amount' => $eoy_adj_work ->getDebitAmount(),
                'credit_amount' => $eoy_adj_work ->getCreditAmount(),
                'account_to_debit' => $defaultDebitTAccountID,
                'account_to_credit' => $defaultCreditTAccountID,
        );
        
        $form = $this->createFormBuilder($defaultData)
                ->add('debit_amount', 'text', 
                        array('required' => false,)
                        )
                ->add('credit_amount', 'text',
                        array('required' => false,)
                    )
                ->add('account_to_debit', 'choice', 
                        array( 
                            'choices' => $accountsMenuArray,
                        )
                  )
                ->add('account_to_credit', 'choice', 
                        array( 
                            'choices' => $accountsMenuArray,
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
                $debit_amount = $data['debit_amount'];
                $credit_amount = $data['credit_amount'];
                $account_to_debit = $data['account_to_debit'];
                $account_to_credit = $data['account_to_credit'];

                
                // (3) set values received from form
                $debit_amount = intval($debit_amount);
                $credit_amount = intval($credit_amount);
                $eoy_adj_work ->setDebitAmount($debit_amount);
                $eoy_adj_work ->setCreditAmount($credit_amount);
                
                $tAccountDebit_id = intval($account_to_debit);
                $tAccountDebit_id = $account_to_debit;
                $tAccountDebit = $em->find('ItbEaccountingBundle:TAccount', $tAccountDebit_id);
                $eoy_adj_work -> setDebitTAccount( $tAccountDebit );

                $tAccountCredit_id = intval($account_to_credit);
                $tAccountCredit_id = $account_to_credit;
                $tAccountCredit = $em->find('ItbEaccountingBundle:TAccount', $tAccountCredit_id);
                $eoy_adj_work -> setCreditTAccount($tAccountCredit);
 
                // (4) persist and flush to DB
                $em->persist($eoy_adj_work);
                $em->flush();
                
                //
                // BUILD params and render template
                //
                $params = array(
                    'cs_id' => $cs_id,
                 );

                // then redirect to list 
                $url = $this->generateUrl('ItbEaccountingBundle_eoy_list', $params);
                return $this->redirect($url);
            }
            else
            {
                $errors["message"] = "unexpected web form error encountered, please contact webmaster/matt smith ...";
                var_dump( $errors); die;        

                // form isInvalid /////////////////
                $errors = array();
                foreach ($form->getErrors() as $key => $error) {
                    $template = $error->getMessageTemplate();
                    $parameters = $error->getMessageParameters();

                    foreach($parameters as $var => $value){
                        $template = str_replace($var, $value, $template);
                    }

                    $errors[$key] = $template;
                }
                if ($form->hasChildren()) {
                foreach ($form->getChildren() as $child) {
                    if (!$child->isValid()) {
                        $errors[$child->getName()] = $this->getErrorMessages($child);
                    }
                }
            }


                
                //
                // BUILD params and render template
                //
                $params = array(
                    'cs_id' => $cs_id,
                 );

                // then redirect to list 
                $url = $this->generateUrl('ItbEaccountingBundle_eoy_list', $params);
                return $this->redirect($url);

            }
        }        
        
        //
        // BUILD params and render template
        //
        $params = array(
            'cs_id' => $cs_id, 
            'adjustment'=> $adjustment,
            'form' => $form->createView(),
        );
        
        return $this->render('ItbEaccountingBundle:EndOfYear:editForm.html.twig', $params);
    
    }    
/* -------------------------------- */
    public function showAccNumberAction($t_account)
    {
/*        
        //
        // get T-acount
        //
        $t_account = $em->findOne('ItbEaccountingBundle:TAccount', $t_account_id);
        $t_accNumber = $t_account -> getAccNumber();
 */
        
        $params = array(
            't_account' => $t_account,
            );
        
        return $this->render('ItbEaccountingBundle:EndOfYear:showAccNumber.html.twig',   $params );
    }

/* -------------------------------- */
    public function showAdjustmentAction($cs_id, $eoy_type, $adjustment)
    {        
        $params = array(
            'cs_id' => $cs_id, 
            'eoy_type' => $eoy_type,
            'adjustment' => $adjustment,
            );


        
        
        return $this->render('ItbEaccountingBundle:EndOfYear:showAdjustment.html.twig',   $params );
    }

/* -------------------------------- */
    public function listTypeAction($cs_id, $eoy_type)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        //
        // find the user account classification record corresponding to this USER and TAccount
        //
        $eoy_type_id = $eoy_type -> getId();
        $adjustments = $em->getRepository('ItbEaccountingBundle:EoyAdjustment')->findBy(
            array(
                'eoyAdjType' => $eoy_type_id,            
            )
        );
        $params = array(
            'cs_id' => $cs_id, 
            'eoy_type' => $eoy_type,
            'adjustments' => $adjustments,
            );
        return $this->render('ItbEaccountingBundle:EndOfYear:listType.html.twig',   $params );
    }

        
/* -------------------------------- */
    public function listAction($cs_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        //
        // get all ledgers for this case study 
        //
        $eoyTypes = $em->getRepository('ItbEaccountingBundle:EoyAdjType')->findBy(
            array(
             'caseStydy' => $cs_id, 
            )
        );        
        
        $params = array(
            'cs_id' => $cs_id, 
            'eoy_types' => $eoyTypes,
            );
        return $this->render('ItbEaccountingBundle:EndOfYear:list.html.twig',   $params );
    }
    
    
    
/* --------------------------------- */
    public function listAccountsAction($cs_id, $ledger)
    {
        
        //
        // get all ledgers for this case study 
        //
        $ledgers = $em->getRepository('ItbEaccountingBundle:Ledger')->findBy(
            array(
             'caseStydy' => $cs_id, 
            )
        );  
        
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
        
        return $this->render('ItbEaccountingBundle:EndOfYear:listAccounts.html.twig', $params);
    }
}