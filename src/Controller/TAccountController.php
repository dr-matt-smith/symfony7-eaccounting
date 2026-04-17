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

#[Route('/t_account')]
class TAccountController extends AbstractController
{

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
    public function userClassificationAction($cs_id, $account)
    {
        // get entity manager
        $em = $this->get('doctrine.orm.entity_manager');
        
        // get case study record
        $case_study = $em->find('ItbEaccountingBundle:CaseStudy', $cs_id);
        
        // get ID of account parameter
        $account_id = $account->getId();

        // get ID of currently logged in user
        $sf_user = $this->get('security.context')->getToken()->getUser();
        $user_id = $sf_user->getUsername();
        
        //
        // find the user account classification record corresponding to this USER and TAccount
        //
        $user_account_class = $em->getRepository('ItbEaccountingBundle:UserAccountClass')->findOneBy(
            array(
             'user' => $user_id, 
             'tAccount' => $account_id, 
                
            )
        );        
        
        $params = array(
            'case_study' => $case_study, 
            'user_account_class' => $user_account_class,
            'account' => $account,
        );

        return $this->render('ItbEaccountingBundle:TAccount:userClassification.html.twig', $params);
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
        
        return $this->render('ItbEaccountingBundle:TAccount:listAccounts.html.twig', $params);
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
        
        return $this->render('ItbEaccountingBundle:TAccount:list.html.twig', $params);

    }
    
/* --------------------------------- */
    public function showAction($cs_id, $account_id)
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

        $balance = NULL;
                
        $debits = $em->getRepository('ItbEaccountingBundle:TAccount')->getDebitsForUserTAccount($user_id, $account_id);
        $credits = $em->getRepository('ItbEaccountingBundle:TAccount')->getCreditsForUserTAccount($user_id, $account_id);

        $params = array(
            'case_study' => $case_study, 
            'account' => $account, 
            'credits' => $credits, 
            'debits' => $debits,
        );
        
        return $this->render('ItbEaccountingBundle:TAccount:show.html.twig', $params);

    }
    

}

