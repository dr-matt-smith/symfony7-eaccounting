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

#[Route('/t_account_closed_off')]
class TAccountClosedOffController extends AbstractController
{
    /* --------------------------------- */
    public function userTrialBalanceWorkAction($cs_id, $t_account_id)
    {        
        //
        // get user ID
        //
        $sf_user = $this->get('security.context')->getToken()->getUser();
        $user_id = $sf_user->getUsername();

        //
        // get entity for WORK record for TAcount and user id
        //
        $repository = $this->getDoctrine()->getRepository('ItbEaccountingBundle:TrialBalanceWork');
        $work = $repository->findOneBy(
            array(
                'user' => $user_id,
                'tAccount' => $t_account_id,
            )
        );

        
        $vars = array(
            'user' => $user_id,
            '$t_account_id' => $t_account_id,
            'work' => $work,    
        );
        
//        var_dump( $vars ); die;
        
        
        $params = array(
            'work' => $work, 
        );
        return $this->render('ItbEaccountingBundle:TAccountClosedOff:userTrialBalanceWork.html.twig', $params);

    }
    
    /* --------------------------------- */
    public function closedOffAction($cs_id)
    {
        // get entity manager
        $em = $this->get('doctrine.orm.entity_manager');
        
        //
        // get all ledgers for this case study 
        //
        $ledgers = $em->getRepository('ItbEaccountingBundle:Ledger')->findBy(
            array(
             'caseStydy' => $cs_id, 
            )
        );        
        
        
        $params = array(
            'cs_id' => $cs_id, 
            'ledgers' => $ledgers,
            'closed_off' => TRUE,
        );
        
        return $this->render('ItbEaccountingBundle:TAccountClosedOff:list.html.twig', $params);

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
        
        return $this->render('ItbEaccountingBundle:TAccountClosedOff:listAccounts.html.twig', $params);
    }	
	


/* --------------------------------- */
    public function listAction($cs_id)
    {
        // get entity manager
        $em = $this->get('doctrine.orm.entity_manager');
        
        //
        // get all ledgers for this case study 
        //
        $ledgers = $em->getRepository('ItbEaccountingBundle:Ledger')->findBy(
            array(
             'caseStydy' => $cs_id, 
            )
        );        
        
        
        $params = array(
            'cs_id' => $cs_id, 
            'ledgers' => $ledgers
        );
        
        return $this->render('ItbEaccountingBundle:TAccountClosedOff:list.html.twig', $params);

    }
    
/* --------------------------------- */
    public function showClosedOffAction($cs_id, $account_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        //
        // get case study id
        //
        $case_study = $em->find('ItbEaccountingBundle:CaseStudy', $cs_id);
        
        //
        // get T-acount
        //
        $account = $em->find('ItbEaccountingBundle:TAccount', $account_id);

        //
        // get user - for id to retrieve WORK entities
        //
        $sf_user = $this->get('security.context')->getToken()->getUser();
        $user_id = $sf_user->getUsername();

        
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
        
        $balance = NULL;
                
        $debits = $em->getRepository('ItbEaccountingBundle:TAccount')->getDebitsForUserTAccount($user_id, $account_id);
        $credits = $em->getRepository('ItbEaccountingBundle:TAccount')->getCreditsForUserTAccount($user_id, $account_id);

        $params = array(
            'case_study' => $case_study, 
            'account' => $account, 
            'credits' => $credits, 
            'debits' => $debits,
            'work' => $work,
        );
        
        return $this->render('ItbEaccountingBundle:TAccountClosedOff:showClosedOff.html.twig', $params);

    }
    

}

