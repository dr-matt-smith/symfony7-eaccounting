<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\BalanceSheet
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BalanceSheet
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var CaseStudy
     *
     * @ORM\ManyToOne(targetEntity="CaseStudy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="caseStudy", referencedColumnName="id")
     * })
     */
    private $caseStudy;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var float $buildingsCost
     *
     * @ORM\Column(name="buildingsCost", type="float")
     */
    private $buildingsCost;

    /**
     * @var float $buildingsDepreciation
     *
     * @ORM\Column(name="buildingsDepreciation", type="float")
     */
    private $buildingsDepreciation;

    /**
     * @var float $buildingsNetValue
     *
     * @ORM\Column(name="buildingsNetValue", type="float")
     */
    private $buildingsNetValue;

    /**
     * @var float $fittingsCost
     *
     * @ORM\Column(name="fittingsCost", type="float")
     */
    private $fittingsCost;

    /**
     * @var float $fittingsDepreciation
     *
     * @ORM\Column(name="fittingsDepreciation", type="float")
     */
    private $fittingsDepreciation;

    /**
     * @var float $fittingsNetValue
     *
     * @ORM\Column(name="fittingsNetValue", type="float")
     */
    private $fittingsNetValue;

    /**
     * @var float $vanCost
     *
     * @ORM\Column(name="vanCost", type="float")
     */
    private $vanCost;

    /**
     * @var float $vanDepreciation
     *
     * @ORM\Column(name="vanDepreciation", type="float")
     */
    private $vanDepreciation;

    /**
     * @var float $vanNetValue
     *
     * @ORM\Column(name="vanNetValue", type="float")
     */
    private $vanNetValue;

    /**
     * @var float $costTotal
     *
     * @ORM\Column(name="costTotal", type="float")
     */
    private $costTotal;

    /**
     * @var float $depreciationTotal
     *
     * @ORM\Column(name="depreciationTotal", type="float")
     */
    private $depreciationTotal;

    /**
     * @var float $netValueTotal
     *
     * @ORM\Column(name="netValueTotal", type="float")
     */
    private $netValueTotal;

    /**
     * @var float $stock
     *
     * @ORM\Column(name="stock", type="float")
     */
    private $stock;

    /**
     * @var float $debtors
     *
     * @ORM\Column(name="debtors", type="float")
     */
    private $debtors;

    /**
     * @var float $badDebts
     *
     * @ORM\Column(name="badDebts", type="float")
     */
    private $badDebts;

    /**
     * @var float $provision
     *
     * @ORM\Column(name="provision", type="float")
     */
    private $provision;

    /**
     * @var float $currentAssetsSubTotal
     *
     * @ORM\Column(name="currentAssetsSubTotal", type="float")
     */
    private $currentAssetsSubTotal;

    /**
     * @var float $prepaymentOfExpense
     *
     * @ORM\Column(name="prepaymentOfExpense", type="float")
     */
    private $prepaymentOfExpense;

    /**
     * @var float $accrualOfIncome
     *
     * @ORM\Column(name="accrualOfIncome", type="float")
     */
    private $accrualOfIncome;

    /**
     * @var float $vatReceivable
     *
     * @ORM\Column(name="vatReceivable", type="float")
     */
    private $vatReceivable;

    /**
     * @var float $bank
     *
     * @ORM\Column(name="bank", type="float")
     */
    private $bank;

    /**
     * @var float $cash
     *
     * @ORM\Column(name="cash", type="float")
     */
    private $cash;

    /**
     * @var float $currentAssetsTotal
     *
     * @ORM\Column(name="currentAssetsTotal", type="float")
     */
    private $currentAssetsTotal;

    /**
     * @var float $creditors
     *
     * @ORM\Column(name="creditors", type="float")
     */
    private $creditors;

    /**
     * @var float $accrualsOfExpense
     *
     * @ORM\Column(name="accrualsOfExpense", type="float")
     */
    private $accrualsOfExpense;

    /**
     * @var float $vatPayable
     *
     * @ORM\Column(name="vatPayable", type="float")
     */
    private $vatPayable;

    /**
     * @var float $prepaymentOfIncome
     *
     * @ORM\Column(name="prepaymentOfIncome", type="float")
     */
    private $prepaymentOfIncome;

    /**
     * @var float $currentLiabilitiesTotal
     *
     * @ORM\Column(name="currentLiabilitiesTotal", type="float")
     */
    private $currentLiabilitiesTotal;

    /**
     * @var float $netCurrentAssets
     *
     * @ORM\Column(name="netCurrentAssets", type="float")
     */
    private $netCurrentAssets;

    /**
     * @var float $totalNetAssets
     *
     * @ORM\Column(name="totalNetAssets", type="float")
     */
    private $totalNetAssets;

    /**
     * @var float $totalAssets
     *
     * @ORM\Column(name="totalAssets", type="float")
     */
    private $totalAssets;

    /**
     * @var float $bankLoan
     *
     * @ORM\Column(name="bankLoan", type="float")
     */
    private $bankLoan;

    /**
     * @var float $openingBalance
     *
     * @ORM\Column(name="openingBalance", type="float")
     */
    private $openingBalance;

    /**
     * @var float $netProfit
     *
     * @ORM\Column(name="netProfit", type="float")
     */
    private $netProfit;

    /**
     * @var float $ownersFund
     *
     * @ORM\Column(name="ownersFund", type="float")
     */
    private $ownersFund;

    /**
     * @var float $drawings
     *
     * @ORM\Column(name="drawings", type="float")
     */
    private $drawings;

    /**
     * @var float $totalLiability
     *
     * @ORM\Column(name="totalLiability", type="float")
     */
    private $totalLiability;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set caseStudy
     *
     * @param integer $caseStudy
     */
    public function setCaseStudy($caseStudy)
    {
        $this->caseStudy = $caseStudy;
    }

    /**
     * Get caseStudy
     *
     * @return integer 
     */
    public function getCaseStudy()
    {
        return $this->caseStudy;
    }

    /**
     * Set user
     *
     * @param integer $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set buildingsCost
     *
     * @param float $buildingsCost
     */
    public function setBuildingsCost($buildingsCost)
    {
        $this->buildingsCost = $buildingsCost;
    }

    /**
     * Get buildingsCost
     *
     * @return float 
     */
    public function getBuildingsCost()
    {
        return $this->buildingsCost;
    }

    /**
     * Set buildingsDepreciation
     *
     * @param float $buildingsDepreciation
     */
    public function setBuildingsDepreciation($buildingsDepreciation)
    {
        $this->buildingsDepreciation = $buildingsDepreciation;
    }

    /**
     * Get buildingsDepreciation
     *
     * @return float 
     */
    public function getBuildingsDepreciation()
    {
        return $this->buildingsDepreciation;
    }

    /**
     * Set buildingsNetValue
     *
     * @param float $buildingsNetValue
     */
    public function setBuildingsNetValue($buildingsNetValue)
    {
        $this->buildingsNetValue = $buildingsNetValue;
    }

    /**
     * Get buildingsNetValue
     *
     * @return float 
     */
    public function getBuildingsNetValue()
    {
        return $this->buildingsNetValue;
    }

    /**
     * Set fittingsCost
     *
     * @param float $fittingsCost
     */
    public function setFittingsCost($fittingsCost)
    {
        $this->fittingsCost = $fittingsCost;
    }

    /**
     * Get fittingsCost
     *
     * @return float 
     */
    public function getFittingsCost()
    {
        return $this->fittingsCost;
    }

    /**
     * Set fittingsDepreciation
     *
     * @param float $fittingsDepreciation
     */
    public function setFittingsDepreciation($fittingsDepreciation)
    {
        $this->fittingsDepreciation = $fittingsDepreciation;
    }

    /**
     * Get fittingsDepreciation
     *
     * @return float 
     */
    public function getFittingsDepreciation()
    {
        return $this->fittingsDepreciation;
    }

    /**
     * Set fittingsNetValue
     *
     * @param float $fittingsNetValue
     */
    public function setFittingsNetValue($fittingsNetValue)
    {
        $this->fittingsNetValue = $fittingsNetValue;
    }

    /**
     * Get fittingsNetValue
     *
     * @return float 
     */
    public function getFittingsNetValue()
    {
        return $this->fittingsNetValue;
    }

    /**
     * Set vanCost
     *
     * @param float $vanCost
     */
    public function setVanCost($vanCost)
    {
        $this->vanCost = $vanCost;
    }

    /**
     * Get vanCost
     *
     * @return float 
     */
    public function getVanCost()
    {
        return $this->vanCost;
    }

    /**
     * Set vanDepreciation
     *
     * @param float $vanDepreciation
     */
    public function setVanDepreciation($vanDepreciation)
    {
        $this->vanDepreciation = $vanDepreciation;
    }

    /**
     * Get vanDepreciation
     *
     * @return float 
     */
    public function getVanDepreciation()
    {
        return $this->vanDepreciation;
    }

    /**
     * Set vanNetValue
     *
     * @param float $vanNetValue
     */
    public function setVanNetValue($vanNetValue)
    {
        $this->vanNetValue = $vanNetValue;
    }

    /**
     * Get vanNetValue
     *
     * @return float 
     */
    public function getVanNetValue()
    {
        return $this->vanNetValue;
    }

    /**
     * Set costTotal
     *
     * @param float $costTotal
     */
    public function setCostTotal($costTotal)
    {
        $this->costTotal = $costTotal;
    }

    /**
     * Get costTotal
     *
     * @return float 
     */
    public function getCostTotal()
    {
        return $this->costTotal;
    }

    /**
     * Set depreciationTotal
     *
     * @param float $depreciationTotal
     */
    public function setDepreciationTotal($depreciationTotal)
    {
        $this->depreciationTotal = $depreciationTotal;
    }

    /**
     * Get depreciationTotal
     *
     * @return float 
     */
    public function getDepreciationTotal()
    {
        return $this->depreciationTotal;
    }

    /**
     * Set netValueTotal
     *
     * @param float $netValueTotal
     */
    public function setNetValueTotal($netValueTotal)
    {
        $this->netValueTotal = $netValueTotal;
    }

    /**
     * Get netValueTotal
     *
     * @return float 
     */
    public function getNetValueTotal()
    {
        return $this->netValueTotal;
    }

    /**
     * Set stock
     *
     * @param float $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * Get stock
     *
     * @return float 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set debtors
     *
     * @param float $debtors
     */
    public function setDebtors($debtors)
    {
        $this->debtors = $debtors;
    }

    /**
     * Get debtors
     *
     * @return float 
     */
    public function getDebtors()
    {
        return $this->debtors;
    }

    /**
     * Set badDebts
     *
     * @param float $badDebts
     */
    public function setBadDebts($badDebts)
    {
        $this->badDebts = $badDebts;
    }

    /**
     * Get badDebts
     *
     * @return float 
     */
    public function getBadDebts()
    {
        return $this->badDebts;
    }

    /**
     * Set provision
     *
     * @param float $provision
     */
    public function setProvision($provision)
    {
        $this->provision = $provision;
    }

    /**
     * Get provision
     *
     * @return float 
     */
    public function getProvision()
    {
        return $this->provision;
    }

    /**
     * Set currentAssetsSubTotal
     *
     * @param float $currentAssetsSubTotal
     */
    public function setCurrentAssetsSubTotal($currentAssetsSubTotal)
    {
        $this->currentAssetsSubTotal = $currentAssetsSubTotal;
    }

    /**
     * Get currentAssetsSubTotal
     *
     * @return float 
     */
    public function getCurrentAssetsSubTotal()
    {
        return $this->currentAssetsSubTotal;
    }

    /**
     * Set prepaymentOfExpense
     *
     * @param float $prepaymentOfExpense
     */
    public function setPrepaymentOfExpense($prepaymentOfExpense)
    {
        $this->prepaymentOfExpense = $prepaymentOfExpense;
    }

    /**
     * Get prepaymentOfExpense
     *
     * @return float 
     */
    public function getPrepaymentOfExpense()
    {
        return $this->prepaymentOfExpense;
    }

    /**
     * Set accrualOfIncome
     *
     * @param float $accrualOfIncome
     */
    public function setAccrualOfIncome($accrualOfIncome)
    {
        $this->accrualOfIncome = $accrualOfIncome;
    }

    /**
     * Get accrualOfIncome
     *
     * @return float 
     */
    public function getAccrualOfIncome()
    {
        return $this->accrualOfIncome;
    }

    /**
     * Set vatReceivable
     *
     * @param float $vatReceivable
     */
    public function setVatReceivable($vatReceivable)
    {
        $this->vatReceivable = $vatReceivable;
    }

    /**
     * Get vatReceivable
     *
     * @return float 
     */
    public function getVatReceivable()
    {
        return $this->vatReceivable;
    }

    /**
     * Set bank
     *
     * @param float $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * Get bank
     *
     * @return float 
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set cash
     *
     * @param float $cash
     */
    public function setCash($cash)
    {
        $this->cash = $cash;
    }

    /**
     * Get cash
     *
     * @return float 
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * Set currentAssetsTotal
     *
     * @param float $currentAssetsTotal
     */
    public function setCurrentAssetsTotal($currentAssetsTotal)
    {
        $this->currentAssetsTotal = $currentAssetsTotal;
    }

    /**
     * Get currentAssetsTotal
     *
     * @return float 
     */
    public function getCurrentAssetsTotal()
    {
        return $this->currentAssetsTotal;
    }

    /**
     * Set creditors
     *
     * @param float $creditors
     */
    public function setCreditors($creditors)
    {
        $this->creditors = $creditors;
    }

    /**
     * Get creditors
     *
     * @return float 
     */
    public function getCreditors()
    {
        return $this->creditors;
    }

    /**
     * Set accrualsOfExpense
     *
     * @param float $accrualsOfExpense
     */
    public function setAccrualsOfExpense($accrualsOfExpense)
    {
        $this->accrualsOfExpense = $accrualsOfExpense;
    }

    /**
     * Get accrualsOfExpense
     *
     * @return float 
     */
    public function getAccrualsOfExpense()
    {
        return $this->accrualsOfExpense;
    }

    /**
     * Set vatPayable
     *
     * @param float $vatPayable
     */
    public function setVatPayable($vatPayable)
    {
        $this->vatPayable = $vatPayable;
    }

    /**
     * Get vatPayable
     *
     * @return float 
     */
    public function getVatPayable()
    {
        return $this->vatPayable;
    }

    /**
     * Set prepaymentOfIncome
     *
     * @param float $prepaymentOfIncome
     */
    public function setPrepaymentOfIncome($prepaymentOfIncome)
    {
        $this->prepaymentOfIncome = $prepaymentOfIncome;
    }

    /**
     * Get prepaymentOfIncome
     *
     * @return float 
     */
    public function getPrepaymentOfIncome()
    {
        return $this->prepaymentOfIncome;
    }

    /**
     * Set currentLiabilitiesTotal
     *
     * @param float $currentLiabilitiesTotal
     */
    public function setCurrentLiabilitiesTotal($currentLiabilitiesTotal)
    {
        $this->currentLiabilitiesTotal = $currentLiabilitiesTotal;
    }

    /**
     * Get currentLiabilitiesTotal
     *
     * @return float 
     */
    public function getCurrentLiabilitiesTotal()
    {
        return $this->currentLiabilitiesTotal;
    }

    /**
     * Set netCurrentAssets
     *
     * @param float $netCurrentAssets
     */
    public function setNetCurrentAssets($netCurrentAssets)
    {
        $this->netCurrentAssets = $netCurrentAssets;
    }

    /**
     * Get netCurrentAssets
     *
     * @return float 
     */
    public function getNetCurrentAssets()
    {
        return $this->netCurrentAssets;
    }

    /**
     * Set totalAssets
     *
     * @param float $totalAssets
     */
    public function setTotalAssets($totalAssets)
    {
        $this->totalAssets = $totalAssets;
    }

    /**
     * Get totalAssets
     *
     * @return float 
     */
    public function getTotalAssets()
    {
        return $this->totalAssets;
    }
    
    /**
     * Set totalNetAssets
     *
     * @param float $totalNetAssets
     */
    public function setTotalNetAssets($totalNetAssets)
    {
        $this->totalNetAssets = $totalNetAssets;
    }

    /**
     * Get totalNetAssets
     *
     * @return float 
     */
    public function getTotalNetAssets()
    {
        return $this->totalNetAssets;
    }

    /**
     * Set bankLoan
     *
     * @param float $bankLoan
     */
    public function setBankLoan($bankLoan)
    {
        $this->bankLoan = $bankLoan;
    }

    /**
     * Get bankLoan
     *
     * @return float 
     */
    public function getBankLoan()
    {
        return $this->bankLoan;
    }

    /**
     * Set openingBalance
     *
     * @param float $openingBalance
     */
    public function setOpeningBalance($openingBalance)
    {
        $this->openingBalance = $openingBalance;
    }

    /**
     * Get openingBalance
     *
     * @return float 
     */
    public function getOpeningBalance()
    {
        return $this->openingBalance;
    }

    /**
     * Set netProfit
     *
     * @param float $netProfit
     */
    public function setNetProfit($netProfit)
    {
        $this->netProfit = $netProfit;
    }

    /**
     * Get netProfit
     *
     * @return float 
     */
    public function getNetProfit()
    {
        return $this->netProfit;
    }

    /**
     * Set ownersFund
     *
     * @param float $ownersFund
     */
    public function setOwnersFund($ownersFund)
    {
        $this->ownersFund = $ownersFund;
    }

    /**
     * Get ownersFund
     *
     * @return float 
     */
    public function getOwnersFund()
    {
        return $this->ownersFund;
    }

    /**
     * Set drawings
     *
     * @param float $drawings
     */
    public function setDrawings($drawings)
    {
        $this->drawings = $drawings;
    }

    /**
     * Get drawings
     *
     * @return float 
     */
    public function getDrawings()
    {
        return $this->drawings;
    }

    /**
     * Set totalLiability
     *
     * @param float $totalLiability
     */
    public function setTotalLiability($totalLiability)
    {
        $this->totalLiability = $totalLiability;
    }

    /**
     * Get totalLiability
     *
     * @return float 
     */
    public function getTotalLiability()
    {
        return $this->totalLiability;
    }
}