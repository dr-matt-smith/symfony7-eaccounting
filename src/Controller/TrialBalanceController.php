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

#[Route('/trial_balance')]
class TrialBalanceController extends AbstractController
{
    

// ----------------------------------------------   
    public function showAction($cs_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
    	//
    	// declare a global object "matt" for the Twig template(s)
        $twig = $this->get('twig');  		
        $twig->addGlobal('matt', new Matt() );    

        $case_studies = $em->getRepository('ItbEaccountingBundle:CaseStudy')->findAll();
        $trial_balance = $em->find('ItbEaccountingBundle:TrialBalance', $cs_id);

        $query = $em
            ->createQuery(
            'SELECT tbl FROM ItbEaccountingBundle:TrialBalanceLedger tbl WHERE tbl.parentLedger IS NULL AND tbl.trialBalance  = :cs_id' )
            ->setParameters(array( 
                'cs_id' => $cs_id, 
            ))
        ;

        $ledgers = $query->getResult();

        $params =  array('cs_id' => $cs_id, 'trial_balance' => $trial_balance, 'ledgers' => $ledgers);
        return $this->render('ItbEaccountingBundle:TrialBalance:show.html.twig',   $params );
    }

// ----------------------------------------------   
    public function listAction($ledger)
    {
    	$ledger_id = $ledger -> getId();
        $em = $this->get('doctrine.orm.entity_manager'); 
        
        $accounts = $em->getRepository('ItbEaccountingBundle:TrialBalanceAccount')->findByTrialBalanceLedger($ledger_id);

        return $this->render('ItbEaccountingBundle:TrialBalance:list.html.twig',  array('accounts' => $accounts));
    }



// ----------------------------------------------    
    public function listSubledgersAction($ledger)
    {
    	$ledger_id = $ledger -> getId();
        $em = $this->get('doctrine.orm.entity_manager'); 

        $qb = $em->createQueryBuilder();
        $qb->add('select', 'tbl')
            ->add('from', 'ItbEaccountingBundle:TrialBalanceLedger tbl')
            ->add('orderBy', 'tbl.orderNumber')
            ->add('where', 'tbl.parentLedger = ?1')
            ->setParameter(1, $ledger_id)
        ;

        $query = $qb->getQuery();
        $subledgers = $query->getResult();


        return $this->render('ItbEaccountingBundle:TrialBalance:listSubledgers.html.twig',  array('subledgers' => $subledgers));
    }



}
