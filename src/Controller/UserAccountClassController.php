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

#[Route('/user_account_class')]
class UserAccountClassController extends AbstractController
{
	
/*

http://localhost:8083/app_dev.php/user_account_class/confirmed_delete/6

*/	
	

/* ------------------------------------------------------- */	
	public function confirmedDeleteAction($user_account_class_id)
	{
		$em = $this->get('doctrine.orm.entity_manager');
		$user_account_class = $em->find('ItbEaccountingBundle:UserAccountClass', $user_account_class_id);
		
		$cs_id = $user_account_class -> getTAccount() -> getLedger() -> getCaseStydy() -> getId();
/*
$msg = "message from UserAccountClassController :: confirmedDeleteAction :: ";
$msg .= "got to (1-1) - pre delete ";
error_log($msg);
*/		
		$em->remove($user_account_class);
		$em->flush();		

/*
$msg = "message from UserAccountClassController :: confirmedDeleteAction :: ";
$msg .= "got to (1-2 - post DELETE)";
error_log($msg);
*/		

	//	return array('account' => $account);

		return $this->redirect($this->generateUrl('ItbEaccountingBundle_t_account_list', array('cs_id' => $cs_id)));


	}		
	
/* ------------------------------------------------------- */	
	public function modifyAction($user_account_class_id, $account_class_id)
	{


//$user_id = 1;
$sf_user = $this->get('security.context')->getToken()->getUser();
$user_id = $sf_user->getUsername();

		$em = $this->get('doctrine.orm.entity_manager');
		$user = $em->find('ItbEaccountingBundle:User', $user_id);
		$user_account_class = $em->find('ItbEaccountingBundle:UserAccountClass', $user_account_class_id);
		$account_class = $em->find('ItbEaccountingBundle:AccountClass', $account_class_id);

		// CHANGE account class for this record, and store the change
		$user_account_class -> setAccountClass( $account_class );
		$em->persist($user_account_class);
		$em->flush();
	
		// get T Account
		$account = $user_account_class -> getTAccount();

		// get case study ID for TAccount redirect
		$cs_id = $account -> getLedger() -> getCaseStydy() -> getId();
		
		// now redirect back to Set confirmation age list 
//        return $this->render('ItbEaccountingBundle:UserAccountClass:set.html.twig', array('user_account_class' => $user_account_class, 'account' => $account));
		return $this->redirect($this->generateUrl('ItbEaccountingBundle_t_account_list', array('cs_id' => $cs_id)));

	}	

/* ------------------------------------------------------- */	
	public function deleteAction($user_account_class_id)
	{
		$em = $this->get('doctrine.orm.entity_manager');
		$user_account_class = $em->find('ItbEaccountingBundle:UserAccountClass', $user_account_class_id);
		$account = $user_account_class -> getTAccount();

		$params = array('user_account_class' => $user_account_class, 'account' => $account);
        return $this->render('ItbEaccountingBundle:UserAccountClass:delete.html.twig', $params);
	}		
	

/* ------------------------------------------------------- */	
	public function editAction($user_account_class_id)
	{
            $em = $this->get('doctrine.orm.entity_manager');
            $user_account_class = $em->find('ItbEaccountingBundle:UserAccountClass', $user_account_class_id);

/*
echo $user_account_class -> getAccountClass() -> getName();	
echo "<hr/>";
echo $user_account_class -> getTAccount() -> getId();
echo "<hr/>";
*/

            $account = $user_account_class -> getTAccount();
            $classes = $em->getRepository('ItbEaccountingBundle:AccountClass')->findAll();

/*
matt woz ere

need to get balance / debits / credits from USER ADDED TRANSACTIONS table 

*/		
		
            $balance = NULL;
            $credits = NULL;
            $debits = NULL;
		
		$params = array('user_account_class' => $user_account_class, 'account' => $account, 'classes' => $classes);
        return $this->render('ItbEaccountingBundle:UserAccountClass:edit.html.twig', $params);
	}		
	
/* ------------------------------------------------------- */	
	public function setAction($account_id, $account_class_id)
	{

//$user_id = 1;
$sf_user = $this->get('security.context')->getToken()->getUser();
$user_id = $sf_user->getUsername();

		$em = $this->get('doctrine.orm.entity_manager');
		$user = $em->find('ItbEaccountingBundle:User', $user_id);
		$account = $em->find('ItbEaccountingBundle:TAccount', $account_id);
		$account_class = $em->find('ItbEaccountingBundle:AccountClass', $account_class_id);
		
		// create and SAVE new record !
		$user_account_class = new UserAccountClass;

		$user_account_class -> setUser( $user );
		$user_account_class -> setTAccount( $account );
		$user_account_class -> setAccountClass( $account_class );
		$em->persist($user_account_class);
		$em->flush();
	
		// get case study ID for TAccount redirect
		$cs_id = $account -> getLedger() -> getCaseStydy() -> getId();
		
//		return array('user_account_class' => $user_account_class, 'account' => $account);
		return $this->redirect($this->generateUrl('ItbEaccountingBundle_t_account_list', array('cs_id' => $cs_id)));

	}



/* ------------------------------------------------------- */	
	public function newUserAccountClassAction($account_id)
	{
		$em = $this->get('doctrine.orm.entity_manager');
		$account = $em->find('ItbEaccountingBundle:TAccount', $account_id);

        $temp = $em->getRepository('ItbEaccountingBundle:AccountClass');
        $classes = $em->getRepository('ItbEaccountingBundle:AccountClass')->findAll();
        
        $count = count( $classes );
/*
matt woz ere

need to get balance / debits / credits from USER ADDED TRANSACTIONS table 

*/		
		
		$balance = NULL;
		$credits = NULL;
		$debits = NULL;
		
		$params = array('account' => $account, 'classes' => $classes);
        return $this->render('ItbEaccountingBundle:UserAccountClass:newUserAccountClass.html.twig', $params);
		
	}	

}

