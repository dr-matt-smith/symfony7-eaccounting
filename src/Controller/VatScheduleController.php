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

#[Route('/vat_schedule')]
class VatScheduleController extends AbstractController
{

/* -------------------------------- */
    public function showAction($cs_id)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        //
    	// declare a global object "matt" for the Twig template(s)
        $twig = $this->get('twig');  		
        $twig->addGlobal('matt', new Matt() );
        $vat_schedules = $em->getRepository('ItbEaccountingBundle:VatSchedule')->findByCaseStydy($cs_id);

        
        $params = array('cs_id' => $cs_id, 'vat_schedules' => $vat_schedules);
        return $this->render('ItbEaccountingBundle:VatSchedule:show.html.twig',   $params );
    }
}