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

#[Route('/balance_sheet')]
class BalanceSheetController extends AbstractController
{

    /* -------------------------------- */
    #[Route('/{cs_id}', name: 'balance_sheet_list', methods: ['GET', 'POST'])]
    public function index(CaseStudyRepository $caseStudyRepository, int $cs_id): Response
    {
        $user = $this->getUser();
        $caseStudy = $caseStudyRepository->find($cs_id);

        //
        // retreive any existing record for this user / case study
        //

        // (1) try to retrieve existing record
        $balance_sheet = $em->getRepository('ItbEaccountingBundle:BalanceSheet')->findOneBy(
            array(
                'caseStudy' => $cs_id,
                'user' => $user_id,
            )
        );

        // (2) if null, create new record
        if( NULL == $balance_sheet){
            $balance_sheet = new BalanceSheet();
            $balance_sheet->setUser($user);
            $balance_sheet->setCaseStudy($caseStudy);
            $balance_sheet->setBuildingsCost(0);
            $balance_sheet->setBuildingsDepreciation(0);
            $balance_sheet->setBuildingsNetValue(0);
            $balance_sheet->setFittingsCost(0);
            $balance_sheet->setFittingsDepreciation(0);
            $balance_sheet->setFittingsNetValue(0);
            $balance_sheet->setVanCost(0);
            $balance_sheet->setVanDepreciation(0);
            $balance_sheet->setVanNetValue(0);
            $balance_sheet->setCostTotal(0);
            $balance_sheet->setDepreciationTotal(0);
            $balance_sheet->setNetValueTotal(0);
            $balance_sheet->setStock(0);
            $balance_sheet->setDebtors(0);
            $balance_sheet->setBadDebts(0);
            $balance_sheet->setProvision(0);
            $balance_sheet->setCurrentAssetsSubTotal(0);
            $balance_sheet->setPrepaymentOfExpense(0);
            $balance_sheet->setAccrualOfIncome(0);
            $balance_sheet->setVatReceivable(0);
            $balance_sheet->setBank(0);
            $balance_sheet->setCash(0);
            $balance_sheet->setCurrentAssetsTotal(0);
            $balance_sheet->setCreditors(0);
            $balance_sheet->setAccrualsOfExpense(0);
            $balance_sheet->setVatPayable(0);
            $balance_sheet->setPrepaymentOfIncome(0);
            $balance_sheet->setCurrentLiabilitiesTotal(0);
            $balance_sheet->setNetCurrentAssets(0);
            $balance_sheet->setTotalAssets(0);
            $balance_sheet->setTotalNetAssets(0);
            $balance_sheet->setBankLoan(0);
            $balance_sheet->setOpeningBalance(0);
            $balance_sheet->setNetProfit(0);
            $balance_sheet->setOwnersFund(0);
            $balance_sheet->setDrawings(0);
            $balance_sheet->setTotalLiability(0);
        }

        // set up default form data
        //
        $defaultData = array(
                'buildingsCost' => $balance_sheet->getBuildingsCost(),
                'buildingsDepreciation' => $balance_sheet->getBuildingsDepreciation(),
                'buildingsNetValue' => $balance_sheet->getBuildingsNetValue(),
                'fittingsCost' => $balance_sheet->getFittingsCost(),
                'fittingsDepreciation' => $balance_sheet->getFittingsDepreciation(),
                'fittingsNetValue' => $balance_sheet->getFittingsNetValue(),
                'vanCost' => $balance_sheet->getVanCost(),
                'vanDepreciation' => $balance_sheet->getVanDepreciation(),
                'vanNetValue' => $balance_sheet->getVanNetValue(),
                'costTotal' => $balance_sheet->getCostTotal(),
                'depreciationTotal' => $balance_sheet->getDepreciationTotal(),
                'netValueTotal' => $balance_sheet->getNetValueTotal(),
                'stock' => $balance_sheet->getStock(),
                'debtors' => $balance_sheet->getDebtors(),
                'badDebts' => $balance_sheet->getBadDebts(),
                'provision' => $balance_sheet->getProvision(),
                'currentAssetsSubTotal' => $balance_sheet->getCurrentAssetsSubTotal(),
                'prepaymentOfExpense' => $balance_sheet->getPrepaymentOfExpense(),
                'accrualOfIncome' => $balance_sheet->getAccrualOfIncome(),
                'vatReceivable' => $balance_sheet->getVatReceivable(),
                'bank' => $balance_sheet->getBank(),
                'cash' => $balance_sheet->getCash(),
                'currentAssetsTotal' => $balance_sheet->getCurrentAssetsTotal(),
                'creditors' => $balance_sheet->getCreditors(),
                'accrualsOfExpense' => $balance_sheet->getAccrualsOfExpense(),
                'vatPayable' => $balance_sheet->getVatPayable(),
                'prepaymentOfIncome' => $balance_sheet->getPrepaymentOfIncome(),
                'currentLiabilitiesTotal' => $balance_sheet->getCurrentLiabilitiesTotal(),
                'netCurrentAssets' => $balance_sheet->getNetCurrentAssets(),
                'totalAssets' => $balance_sheet->getTotalAssets(),
                'totalNetAssets' => $balance_sheet->getTotalNetAssets(),
                'bankLoan' => $balance_sheet->getBankLoan(),
                'openingBalance' => $balance_sheet->getOpeningBalance(),
                'netProfit' => $balance_sheet->getNetProfit(),
                'ownersFund' => $balance_sheet->getOwnersFund(),
                'drawings' => $balance_sheet->getDrawings(),
                'totalLiability' => $balance_sheet->getTotalLiability(),
            );

        $form = $this->createFormBuilder($defaultData)
                ->add('buildingsCost', 'text', array('required' => false) )
                ->add('buildingsDepreciation', 'text', array('required' => false) )
                ->add('buildingsNetValue', 'text', array('required' => false) )
                ->add('fittingsCost', 'text', array('required' => false) )
                ->add('fittingsDepreciation', 'text', array('required' => false) )
                ->add('fittingsNetValue', 'text', array('required' => false) )
                ->add('vanCost', 'text', array('required' => false) )
                ->add('vanDepreciation', 'text', array('required' => false) )
                ->add('vanNetValue', 'text', array('required' => false) )
                ->add('costTotal', 'text', array('required' => false) )
                ->add('depreciationTotal', 'text', array('required' => false) )
                ->add('netValueTotal', 'text', array('required' => false) )
                ->add('stock', 'text', array('required' => false) )
                ->add('debtors', 'text', array('required' => false) )
                ->add('badDebts', 'text', array('required' => false) )
                ->add('provision', 'text', array('required' => false) )
                ->add('currentAssetsSubTotal', 'text', array('required' => false) )
                ->add('prepaymentOfExpense', 'text', array('required' => false) )
                ->add('accrualOfIncome', 'text', array('required' => false) )
                ->add('vatReceivable', 'text', array('required' => false) )
                ->add('bank', 'text', array('required' => false) )
                ->add('cash', 'text', array('required' => false) )
                ->add('currentAssetsTotal', 'text', array('required' => false) )
                ->add('creditors', 'text', array('required' => false) )
                ->add('accrualsOfExpense', 'text', array('required' => false) )
                ->add('vatPayable', 'text', array('required' => false) )
                ->add('prepaymentOfIncome', 'text', array('required' => false) )
                ->add('currentLiabilitiesTotal', 'text', array('required' => false) )
                ->add('netCurrentAssets', 'text', array('required' => false) )
                ->add('totalAssets', 'text', array('required' => false) )
                ->add('totalNetAssets', 'text', array('required' => false) )
                ->add('bankLoan', 'text', array('required' => false) )
                ->add('openingBalance', 'text', array('required' => false) )
                ->add('netProfit', 'text', array('required' => false) )
                ->add('ownersFund', 'text', array('required' => false) )
                ->add('drawings', 'text', array('required' => false) )
                ->add('totalLiability', 'text', array('required' => false) )

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
                $balance_sheet->setBuildingsCost(floatval($data['buildingsCost']));
                $balance_sheet->setBuildingsDepreciation(floatval($data['buildingsDepreciation']));
                $balance_sheet->setBuildingsNetValue(floatval($data['buildingsNetValue']));
                $balance_sheet->setFittingsCost(floatval($data['fittingsCost']));
                $balance_sheet->setFittingsDepreciation(floatval($data['fittingsDepreciation']));
                $balance_sheet->setFittingsNetValue(floatval($data['fittingsNetValue']));
                $balance_sheet->setVanCost(floatval($data['vanCost']));
                $balance_sheet->setVanDepreciation(floatval($data['vanDepreciation']));
                $balance_sheet->setVanNetValue(floatval($data['vanNetValue']));
                $balance_sheet->setCostTotal(floatval($data['costTotal']));
                $balance_sheet->setDepreciationTotal(floatval($data['depreciationTotal']));
                $balance_sheet->setNetValueTotal(floatval($data['netValueTotal']));
                $balance_sheet->setStock(floatval($data['stock']));
                $balance_sheet->setDebtors(floatval($data['debtors']));
                $balance_sheet->setBadDebts(floatval($data['badDebts']));
                $balance_sheet->setProvision(floatval($data['provision']));
                $balance_sheet->setCurrentAssetsSubTotal(floatval($data['currentAssetsSubTotal']));
                $balance_sheet->setPrepaymentOfExpense(floatval($data['prepaymentOfExpense']));
                $balance_sheet->setAccrualOfIncome(floatval($data['accrualOfIncome']));
                $balance_sheet->setVatReceivable(floatval($data['vatReceivable']));
                $balance_sheet->setBank(floatval($data['bank']));
                $balance_sheet->setCash(floatval($data['cash']));
                $balance_sheet->setCurrentAssetsTotal(floatval($data['currentAssetsTotal']));
                $balance_sheet->setCreditors(floatval($data['creditors']));
                $balance_sheet->setAccrualsOfExpense(floatval($data['accrualsOfExpense']));
                $balance_sheet->setVatPayable(floatval($data['vatPayable']));
                $balance_sheet->setPrepaymentOfIncome(floatval($data['prepaymentOfIncome']));
                $balance_sheet->setCurrentLiabilitiesTotal(floatval($data['currentLiabilitiesTotal']));
                $balance_sheet->setNetCurrentAssets(floatval($data['netCurrentAssets']));
                $balance_sheet->setTotalAssets(floatval($data['totalAssets']));
                $balance_sheet->setTotalNetAssets(floatval($data['totalNetAssets']));
                $balance_sheet->setBankLoan(floatval($data['bankLoan']));
                $balance_sheet->setOpeningBalance(floatval($data['openingBalance']));
                $balance_sheet->setNetProfit(floatval($data['netProfit']));
                $balance_sheet->setOwnersFund(floatval($data['ownersFund']));
                $balance_sheet->setDrawings(floatval($data['drawings']));
                $balance_sheet->setTotalLiability(floatval($data['totalLiability']));

                // (4) persist and flush to DB
                $em->persist($balance_sheet);
                $em->flush();

                //
                // BUILD params and render template
                //
                $params = array(
                    'cs_id' => $cs_id,
                    );

                // then redirect to list
                $url = $this->generateUrl('ItbEaccountingBundle_balance_sheet_list', $params);
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
            $url = $this->generateUrl('ItbEaccountingBundle_balance_sheet_list', $params);
            return $this->redirect($url);

        } // if

        //
        // BUILD params and render template
        //
        $params = array(
            'cs_id' => $cs_id,
            'form' => $form->createView(),
        );

        return $this->render('ItbEaccountingBundle:BalanceSheet:list.html.twig', $params);

    } // method

}