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

#[Route('/profit_loss')]
class ProfitAndLossController extends AbstractController
{	

/* -------------------------------- */
public function listAction(Request $request, $cs_id)
{
    $em = $this->get('doctrine.orm.entity_manager');

    // get ID of current user
    $sf_user = $this->get('security.context')->getToken()->getUser();
    $user_id = $sf_user->getUsername();
    $user = $em->find('ItbEaccountingBundle:User', $user_id);
    $caseStudy = $em->find('ItbEaccountingBundle:CaseStudy', $cs_id);

    //
    // retreive any existing record for this user / case study
    //

    // (1) try to retrieve existing record
    $profit_loss = $em->getRepository('ItbEaccountingBundle:ProfitAndLoss')->findOneBy(
        array(
            'caseStudy' => $cs_id,
            'user' => $user_id, 
        )
    );

    // (2) if null, create new record
    if( NULL == $profit_loss){
        $profit_loss = new ProfitAndLoss();
        $profit_loss -> setUser($user);
        $profit_loss -> setCaseStudy($caseStudy);
        $profit_loss ->setSales(0);
        $profit_loss ->setReturns(0);
        $profit_loss ->setNetSales(0);
        $profit_loss ->setOpeningStock(0);
        $profit_loss ->setPurchases(0);
        $profit_loss ->setCarriageIn(0);
        $profit_loss ->setClosingStock(0);
        $profit_loss ->setCostOfSales(0);
        $profit_loss ->setGrossProfit(0);
        $profit_loss ->setDiscountsReceived(0);
        $profit_loss ->setDecreaseBadDebts(0);
        $profit_loss ->setWagesAndSalaries(0);
        $profit_loss ->setLightAndHeat(0);
        $profit_loss ->setRent(0);
        $profit_loss ->setDiscountsAllowed(0);
        $profit_loss ->setTelephone(0);
        $profit_loss ->setCarriageOut(0);
        $profit_loss ->setGeneralExpenses(0);
        $profit_loss ->setProvisionBadDebts(0);
        $profit_loss ->setDebtsWrittenOff(0);
        $profit_loss ->setMotorExpenses(0);
        $profit_loss ->setInsurance(0);
        $profit_loss ->setDepreciationCharge(0);
        
    }

    // set up default form data
    //
    $defaultData = array(
            'sales' => $profit_loss ->getSales(),
            'returns' => $profit_loss ->getReturns(),
            'netSales' => $profit_loss ->getNetSales(),
            'openingStock' => $profit_loss ->getOpeningStock(),
            'purchases' => $profit_loss ->getPurchases(),
            'carriageIn' => $profit_loss ->getCarriageIn(),
            'closingStock' => $profit_loss ->getClosingStock(),
            'costOfSales' => $profit_loss ->getCostOfSales(),
            'grossProfit' => $profit_loss ->getGrossProfit(),
            'discountsReceived' => $profit_loss ->getDiscountsReceived(),
            'decreaseBadDebts' => $profit_loss ->getDecreaseBadDebts(),
            'wagesAndSalaries' => $profit_loss ->getWagesAndSalaries(),
            'lightAndHeat' => $profit_loss ->getLightAndHeat(),
            'rent' => $profit_loss ->getRent(),
            'discountsAllowed' => $profit_loss ->getDiscountsAllowed(),
            'telephone' => $profit_loss ->getTelephone(),
            'carriageOut' => $profit_loss ->getCarriageOut(),
            'generalExpenses' => $profit_loss ->getGeneralExpenses(),
            'provisionBadDebts' => $profit_loss ->getProvisionBadDebts(),
            'debtsWrittenOff' => $profit_loss ->getDebtsWrittenOff(),
            'motorExpenses' => $profit_loss ->getMotorExpenses(),
            'insurance' => $profit_loss ->getInsurance(),
            'depreciationCharge' => $profit_loss ->getDepreciationCharge(),
    );

    $form = $this->createFormBuilder($defaultData)
            ->add('sales', 'text', array('required' => false) )
            ->add('returns', 'text', array('required' => false) )
            ->add('netSales', 'text', array('required' => false) )
            ->add('openingStock', 'text', array('required' => false) )
            ->add('purchases', 'text', array('required' => false) )
            ->add('carriageIn', 'text', array('required' => false) )
            ->add('closingStock', 'text', array('required' => false) )
            ->add('costOfSales', 'text', array('required' => false) )
            ->add('grossProfit', 'text', array('required' => false) )
            ->add('discountsReceived', 'text', array('required' => false) )
            ->add('decreaseBadDebts', 'text', array('required' => false) )
            ->add('wagesAndSalaries', 'text', array('required' => false) )
            ->add('lightAndHeat', 'text', array('required' => false) )
            ->add('rent', 'text', array('required' => false) )
            ->add('discountsAllowed', 'text', array('required' => false) )
            ->add('telephone', 'text', array('required' => false) )
            ->add('carriageOut', 'text', array('required' => false) )
            ->add('generalExpenses', 'text', array('required' => false) )
            ->add('provisionBadDebts', 'text', array('required' => false) )
            ->add('debtsWrittenOff', 'text', array('required' => false) )
            ->add('motorExpenses', 'text', array('required' => false) )
            ->add('insurance', 'text', array('required' => false) )
            ->add('depreciationCharge', 'text', array('required' => false) )
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

            //
            // (3) build object to be persisted to DB
            //
            $profit_loss ->setSales(floatval($data['sales']));
            $profit_loss ->setReturns($data['returns']);
            $profit_loss ->setNetSales(floatval($data['netSales']));
            $profit_loss ->setOpeningStock($data['openingStock']);
            $profit_loss ->setPurchases($data['purchases']);
            $profit_loss ->setCarriageIn($data['carriageIn']);
            $profit_loss ->setClosingStock($data['closingStock']);
            $profit_loss ->setCostOfSales(floatval($data['costOfSales']));
            $profit_loss ->setGrossProfit($data['grossProfit']);
            $profit_loss ->setDiscountsReceived($data['discountsReceived']);
            $profit_loss ->setDecreaseBadDebts($data['decreaseBadDebts']);
            $profit_loss ->setWagesAndSalaries($data['wagesAndSalaries']);
            $profit_loss ->setLightAndHeat($data['lightAndHeat']);
            $profit_loss ->setRent($data['rent']);
            $profit_loss ->setDiscountsAllowed($data['discountsAllowed']);
            $profit_loss ->setTelephone($data['telephone']);
            $profit_loss ->setCarriageOut($data['carriageOut']);
            $profit_loss ->setGeneralExpenses($data['generalExpenses']);
            $profit_loss ->setProvisionBadDebts($data['provisionBadDebts']);
            $profit_loss ->setDebtsWrittenOff($data['debtsWrittenOff']);
            $profit_loss ->setMotorExpenses($data['motorExpenses']);
            $profit_loss ->setInsurance($data['insurance']);            
            $profit_loss ->setDepreciationCharge($data['depreciationCharge']);

            // (4) persist and flush to DB
            $em->persist($profit_loss);
            $em->flush();

            //
            // BUILD params and render template
            //
            $params = array(
                'cs_id' => $cs_id,
                );

            // then redirect to list 
            $url = $this->generateUrl('ItbEaccountingBundle_pandl_list', $params);
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

                foreach($parameters as $var => $value)
                {
                    $template = str_replace($var, $value, $template);
                }

                $errors[$key] = $template;
            }

            if ($form->hasChildren()) 
            {
                foreach ($form->getChildren() as $child) 
                {
                    if (!$child->isValid()) 
                    {
                        $errors[$child->getName()] = $this->getErrorMessages($child);
                    }
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
        $url = $this->generateUrl('ItbEaccountingBundle_pandl_list', $params);
        return $this->redirect($url);

    } // if

    //
    // BUILD params and render template
    //
    $params = array(
        'cs_id' => $cs_id, 
        'form' => $form->createView(),
    );

    return $this->render('ItbEaccountingBundle:ProfitAndLoss:list.html.twig', $params);

} // method


} // class