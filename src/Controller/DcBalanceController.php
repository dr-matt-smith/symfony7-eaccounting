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

#[Route('/dc_balance')]
class DcBalanceController extends AbstractController
{


/* ------------------------------------------------------- */
    public function listAction($ledger)
    {
    	$ledger_id = $ledger -> getId();
    	
        $em = $this->get('doctrine.orm.entity_manager'); 

        $accounts = $em->getRepository('ItbEaccountingBundle:DcBalanceAccount')->findByDcBalanceLedger( $ledger_id);

        //
        // NOTE - reuse here of the "TrialBalance" template, since the same as needed for DC balance accounts display
        //
        return $this->render('ItbEaccountingBundle:TrialBalance:list.html.twig',  array('accounts' => $accounts));
    }
    
    
/* ------------------------------------------------------- */
    public function showAction($cs_id)
    {
/*       
$logger = $this->get('logger');
$logger->err('An error occurred');
$logger->err("==================== matt wozzzzzz ere ============");
$logger->err("message from DcBalanceController :: showAction :: ");
$logger->err("1");
*/
    	//
    	// declare a global object "matt" for the Twig template(s)
        $twig = $this->get('twig');  		
        $twig->addGlobal('matt', new Matt() );    

        //
        // now find ledgers etc.
        $em = $this->get('doctrine.orm.entity_manager');
        $dc_balance = $em->find('ItbEaccountingBundle:DcBalance', $cs_id);

        $ledgers = $em->getRepository('ItbEaccountingBundle:DcBalanceLedger')->findAll();

        $params = array('cs_id' => $cs_id, 'dc_balance' => $dc_balance, 'ledgers' => $ledgers);
        return $this->render('ItbEaccountingBundle:DcBalance:show.html.twig', $params);
    }
}

