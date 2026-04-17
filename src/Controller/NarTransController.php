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

#[Route('/nar_trans')]
class NarTransController extends AbstractController
{
	
/* --------------------------------------------------------- */
    public function accountRowsAction($cs_id, $nt_trans_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $case_study = $em->find('ItbEaccountingBundle:CaseStudy', $cs_id);
        $nt_transaction = $em->find('ItbEaccountingBundle:NtTransaction', $nt_trans_id);
        
        // get ID of current user
        $sf_user = $this->get('security.context')->getToken()->getUser();
        $user_id = $sf_user->getUsername();

        // get all NT_TRANSACTIONS for this case study
        $nt_user_work = $em->getRepository('ItbEaccountingBundle:NarTransWork')->findOneBy(
            array(
                'user' => $user_id,
                'ntTransaction' => $nt_trans_id,
            )
        );        
        
        
        $params = array(
            'case_study' => $case_study, 
            'nt_transaction' => $nt_transaction, 
            'nt_user_work' => $nt_user_work
        );
        
        return $this->render('ItbEaccountingBundle:NarTrans:accountRows.html.twig', $params);
    }	
    
/* --------------------------------------------------------- */
    public function showAction($cs_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $case_study = $em->find('ItbEaccountingBundle:CaseStudy', $cs_id);
        $nar_trans = $em->find('ItbEaccountingBundle:NarTrans', $cs_id);

        // get all NT_TRANSACTIONS for this case study
        $nt_transactions = $em->getRepository('ItbEaccountingBundle:NtTransaction')->findBy(
            array(
                'narTransId' => $cs_id,
            )
        );        
        
        $params =  array(
            'case_study' => $case_study, 
            'nar_trans' => $nar_trans, 
            'nt_transactions' => $nt_transactions
        );
        
        return $this->render('ItbEaccountingBundle:NarTrans:show.html.twig', $params);
    }
    
    
/* --------------------------------------------------------- */
    public function update_debit1Action($cs_id,$nt_transaction_id, $account_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $nt_transaction = $em->find('ItbEaccountingBundle:NtTransaction', $nt_transaction_id);

// app.user.username
$sf_user = $this->get('security.context')->getToken()->getUser();
$user_id = $sf_user->getUsername();
		// get ref to User record
		$user = $em->find('ItbEaccountingBundle:User', $user_id);

		$all_nt_trans_works = $em->getRepository('ItbEaccountingBundle:NarTransWork')->findAll();
		
		
///////////// just those for this NT_TRANSACTION
		$nt_trans_works = NULL;
		
		// loop through all ledgers for this CS to find ones with no parent
  		foreach( $all_nt_trans_works as $nt_trans_work)
  		{
  			$curr_nt_transaction_id = $nt_trans_work -> getNtTransaction() -> getId();
  			
  			if( $curr_nt_transaction_id == $nt_transaction_id)
  			{
  				// append this ledger to the ledgers array
  				$nt_trans_works[] = $nt_trans_work;	
  			}
  		}		
  		
///////////// just those for this user
		$user_nt_trans_work = NULL;
		
		// loop through all ledgers for this CS to find ones with no parent
		if( $nt_trans_works )
		{
	  		foreach( $nt_trans_works as $nt_trans_work)
	  		{
	  			$nt_trans_work_user = $nt_trans_work -> getUser();
	  			
	  			if( $nt_trans_work_user == $user)
	  			{
	  				// this must be the record
	  				$user_nt_trans_work = $nt_trans_work;	
	  			}
	  		}
		}  		
  		
		// if no existing record, create one
		if( NULL == $user_nt_trans_work)
		{
			$user_nt_trans_work = new NarTransWork;
			$user_nt_trans_work  -> setUser( $user );
			$user_nt_trans_work -> setNtTransaction( $nt_transaction );
		}
		
		// if account set to an account (rather than NULL)
		if($account_id > 0)
		{
			$account = $em->find('ItbEaccountingBundle:TAccount', $account_id);
			$user_nt_trans_work -> setTAccDebit( $account );
		}
		else
		{
			$user_nt_trans_work -> clearTAccDebit();
//			$user_nt_trans_work -> setTAccDebit( NULL );
		}

		$em->persist($user_nt_trans_work);
		$em->flush();	

		return $this->redirect($this->generateUrl('ItbEaccountingBundle_nar_trans_edit', array('cs_id' => $cs_id, 'nt_trans_id' => $nt_transaction_id)));
    }


/* --------------------------------------------------------- */
    public function update_debit2Action($cs_id,$nt_transaction_id, $account_id)
    {
		$em = $this->get('doctrine.orm.entity_manager');
		$nt_transaction = $em->find('ItbEaccountingBundle:NtTransaction', $nt_transaction_id);

//$user_id = 1;
$sf_user = $this->get('security.context')->getToken()->getUser();
$user_id = $sf_user->getUsername();

		// get ref to User record
		$user = $em->find('ItbEaccountingBundle:User', $user_id);

		$all_nt_trans_works = $em->getRepository('ItbEaccountingBundle:NarTransWork')->findAll();
		
		
///////////// just those for this NT_TRANSACTION
		$nt_trans_works = NULL;
		
		// loop through all ledgers for this CS to find ones with no parent
  		foreach( $all_nt_trans_works as $nt_trans_work)
  		{
  			$curr_nt_transaction_id = $nt_trans_work -> getNtTransaction() -> getId();
  			
  			if( $curr_nt_transaction_id == $nt_transaction_id)
  			{
  				// append this ledger to the ledgers array
  				$nt_trans_works[] = $nt_trans_work;	
  			}
  		}		
  		
///////////// just those for this user
		$user_nt_trans_work = NULL;
		
		// loop through all ledgers for this CS to find ones with no parent
		if( $nt_trans_works )
		{
	  		foreach( $nt_trans_works as $nt_trans_work)
	  		{
	  			$nt_trans_work_user = $nt_trans_work -> getUser();
	  			
	  			if( $nt_trans_work_user == $user)
	  			{
	  				// this must be the record
	  				$user_nt_trans_work = $nt_trans_work;	
	  			}
	  		}
		}  		
  		
		// if no existing record, create one
		if( NULL == $user_nt_trans_work)
		{
			$user_nt_trans_work = new NarTransWork;
			$user_nt_trans_work  -> setUser( $user );
			$user_nt_trans_work -> setNtTransaction( $nt_transaction );
		}
		
		// if account set to an account (rather than NULL)
		if($account_id > 0)
		{
			$account = $em->find('ItbEaccountingBundle:TAccount', $account_id);
			$user_nt_trans_work -> setAccDebit( $account );
		}
		else
		{
			$user_nt_trans_work -> clearAccDebit();
//			$user_nt_trans_work -> setAccDebit( NULL );
		}

		$em->persist($user_nt_trans_work);
		$em->flush();	

		return $this->redirect($this->generateUrl('ItbEaccountingBundle_nar_trans_edit', array('cs_id' => $cs_id, 'nt_trans_id' => $nt_transaction_id)));
    }

	
/* --------------------------------------------------------- */
    public function update_credit1Action($cs_id,$nt_transaction_id, $account_id)
    {
		$em = $this->get('doctrine.orm.entity_manager');
		$nt_transaction = $em->find('ItbEaccountingBundle:NtTransaction', $nt_transaction_id);

//$user_id = 1;
$sf_user = $this->get('security.context')->getToken()->getUser();
$user_id = $sf_user->getUsername();
		// get ref to User record
		$user = $em->find('ItbEaccountingBundle:User', $user_id);

		$all_nt_trans_works = $em->getRepository('ItbEaccountingBundle:NarTransWork')->findAll();
		
///////////// just those for this NT_TRANSACTION
		$nt_trans_works = NULL;
		
		// loop through all ledgers for this CS to find ones with no parent
  		foreach( $all_nt_trans_works as $nt_trans_work)
  		{
  			$curr_nt_transaction_id = $nt_trans_work -> getNtTransaction() -> getId();
  			
  			if( $curr_nt_transaction_id == $nt_transaction_id)
  			{
  				// append this ledger to the ledgers array
  				$nt_trans_works[] = $nt_trans_work;	
  			}
  		}		
  		
///////////// just those for this user
		$user_nt_trans_work = NULL;

		// loop through all ledgers for this CS to find ones with no parent
		if( $nt_trans_works )
		{
	  		foreach( $nt_trans_works as $nt_trans_work)
	  		{
	  			$nt_trans_work_user = $nt_trans_work -> getUser();
	  			
	  			if( $nt_trans_work_user == $user)
	  			{
	  				// this must be the record
	  				$user_nt_trans_work = $nt_trans_work;	
	  			}
	  		}
		}  		
  		
		// if no existing record, create one
		if( NULL == $user_nt_trans_work)
		{
			$user_nt_trans_work = new NarTransWork;
			$user_nt_trans_work  -> setUser( $user );
			$user_nt_trans_work -> setNtTransaction( $nt_transaction );
		}

		// if account set to an account (rather than NULL)
		if($account_id > 0)
		{
			$account = $em->find('ItbEaccountingBundle:TAccount', $account_id);
			$user_nt_trans_work -> setTAccCredit( $account );
		}
		else
		{
			$user_nt_trans_work -> clearTAccCredit();
//			$user_nt_trans_work -> setTAccCredit( NULL );
		}

		$em->persist($user_nt_trans_work);
		$em->flush();	

		return $this->redirect($this->generateUrl('ItbEaccountingBundle_nar_trans_edit', array('cs_id' => $cs_id, 'nt_trans_id' => $nt_transaction_id)));
    }

	
/* --------------------------------------------------------- */
    public function update_credit2Action($cs_id,$nt_transaction_id, $account_id)
    {
		$em = $this->get('doctrine.orm.entity_manager');
		$nt_transaction = $em->find('ItbEaccountingBundle:NtTransaction', $nt_transaction_id);

//$user_id = 1;
$sf_user = $this->get('security.context')->getToken()->getUser();
$user_id = $sf_user->getUsername();
		// get ref to User record
		$user = $em->find('ItbEaccountingBundle:User', $user_id);

		$all_nt_trans_works = $em->getRepository('ItbEaccountingBundle:NarTransWork')->findAll();
		
		
///////////// just those for this NT_TRANSACTION
		$nt_trans_works = NULL;
		
		// loop through all ledgers for this CS to find ones with no parent
  		foreach( $all_nt_trans_works as $nt_trans_work)
  		{
  			$curr_nt_transaction_id = $nt_trans_work -> getNtTransaction() -> getId();
  			
  			if( $curr_nt_transaction_id == $nt_transaction_id)
  			{
  				// append this ledger to the ledgers array
  				$nt_trans_works[] = $nt_trans_work;	
  			}
  		}		
  		
///////////// just those for this user
		$user_nt_trans_work = NULL;
		
		// loop through all ledgers for this CS to find ones with no parent
		if( $nt_trans_works )
		{
	  		foreach( $nt_trans_works as $nt_trans_work)
	  		{
	  			$nt_trans_work_user = $nt_trans_work -> getUser();
	  			
	  			if( $nt_trans_work_user == $user)
	  			{
	  				// this must be the record
	  				$user_nt_trans_work = $nt_trans_work;	
	  			}
	  		}
		}  		
  		
		// if no existing record, create one
		if( NULL == $user_nt_trans_work)
		{
			$user_nt_trans_work = new NarTransWork;
			$user_nt_trans_work  -> setUser( $user );
			$user_nt_trans_work -> setNtTransaction( $nt_transaction );
		}
		
		// if account set to an account (rather than NULL)
		if($account_id > 0)
		{
			$account = $em->find('ItbEaccountingBundle:TAccount', $account_id);
			$user_nt_trans_work -> setAccCredit( $account );
		}
		else
		{
			$user_nt_trans_work -> clearAccCredit();
//			$user_nt_trans_work -> setAccCredit( NULL );
		}

		$em->persist($user_nt_trans_work);
		$em->flush();	

		return $this->redirect($this->generateUrl('ItbEaccountingBundle_nar_trans_edit', array('cs_id' => $cs_id, 'nt_trans_id' => $nt_transaction_id)));
    }

	
/* --------------------------------------------------------- */
    public function editAction($cs_id, $nt_trans_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
		$case_study = $em->find('ItbEaccountingBundle:CaseStudy', $cs_id);
        $nt_transaction = $em->find('ItbEaccountingBundle:NtTransaction', $nt_trans_id);
        
        // get T-accounts for Nominal ledger
        $nominal_ledgers = $em->getRepository('ItbEaccountingBundle:Ledger')->findBy( array('name' => 'Nominal Ledger') );

        // ID of nominal ledger for given case study
        $nominal_ledger_id = NULL;
        
		// loop through all ledgers for this CS to find ones with no parent
  		foreach( $nominal_ledgers as $nominal_ledger)
  		{
  			$nominal_ledger_case_study = $nominal_ledger -> getCaseStydy();
  			$nominal_ledger_case_study_id = $nominal_ledger_case_study -> getId();
  			  			
  			if( $cs_id == $nominal_ledger_case_study_id)
  			{
  				$nominal_ledger_id = $nominal_ledger -> getId();
  			}
  		}

		//
		// now find all T-accounts for this ledger
		//

/*
matt woz ere

ORDER BY acc_number? 

*/
		$all_accounts = $em->getRepository('ItbEaccountingBundle:TAccount')->findAll();
  
		// array of ledgers with no parent
		$accounts = array();
		
		$all_ledgers = $em->getRepository('ItbEaccountingBundle:Ledger')->findAll();
  
		// array of ledgers with no parent
		$ledgers = array();
		
		// loop through all ledgers for this CS to find ones with no parent
  		foreach( $all_ledgers as $ledger)
  		{
  			$ledger_case_study = $ledger -> getCaseStydy();
  			$ledger_case_study_id = $ledger_case_study -> getId();
  			  			
  			if( ($cs_id == $ledger_case_study_id) )
  			{
				// NOW ADD ALL T-ACCOUNTS for this LEDGER to accounts[]
		
				// loop through all ledgers for this CS to find ones with no parent
		  		foreach( $all_accounts as $account)
		  		{
		  			$account_ledger = $account -> getLedger();
		  			
		  			if( $ledger == $account_ledger)
		  			{
		  				// append this ledger to the ledgers array
		  				$accounts[] = $account;	
		  			}
		  		}

  			}
  		}



//$user_id = 1;
$sf_user = $this->get('security.context')->getToken()->getUser();
$user_id = $sf_user->getUsername();

        // get record for user's answer for this NT_TRANSACTION
        $all_nar_trans_work = $em->getRepository('ItbEaccountingBundle:NarTransWork')->findAll();

		// default is no user answers for this NT_TRANSACTION
		$nt_user_work = NULL;
		
		// loop through all ledgers for this CS to find ones with no parent
  		foreach( $all_nar_trans_work as $nar_trans_work)
  		{
  			$user_nt_transaction_id = $nar_trans_work->getNtTransaction() -> getId();
  			$user_nt_transaction__user_id = $nar_trans_work-> getUser() -> getId();

			// only consider NarTranWork records for current user
			if( $user_id == $user_nt_transaction__user_id)
			{
	  			if( ($nt_trans_id == $user_nt_transaction_id) )
	  			{
	  				// this is user's set of answers for this NT_TRANSACTION
	  				$nt_user_work = $nar_trans_work;	
	  			}
			}
  		}
  		  		
        $params = array(
            'case_study' => $case_study, 
            'nt_transaction' => $nt_transaction, 
            'accounts'=> $accounts, 
            'nt_user_work' => $nt_user_work
        );
        return $this->render('ItbEaccountingBundle:NarTrans:edit.html.twig', $params);
    }		


}
