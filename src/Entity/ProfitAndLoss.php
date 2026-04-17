<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\ProfitAndLoss
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ProfitAndLoss
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
     * @ORM\ManyToOne(targetEntity="Maynooth\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */ 
    private $user;

    /**
     * @var float $sales
     *
     * @ORM\Column(name="sales", type="float")
     */
    private $sales;

    /**
     * @var float $returns
     *
     * @ORM\Column(name="returns", type="float")
     */
    private $returns;

    /**
     * @var float $netSales
     *
     * @ORM\Column(name="netSales", type="float")
     */
    private $netSales;

    /**
     * @var float $openingStock
     *
     * @ORM\Column(name="openingStock", type="float")
     */
    private $openingStock;

    /**
     * @var float $purchases
     *
     * @ORM\Column(name="purchases", type="float")
     */
    private $purchases;

    /**
     * @var float $carriageIn
     *
     * @ORM\Column(name="carriageIn", type="float")
     */
    private $carriageIn;

    /**
     * @var float $closingStock
     *
     * @ORM\Column(name="closingStock", type="float")
     */
    private $closingStock;

    /**
     * @var float $costOfSales
     *
     * @ORM\Column(name="costOfSales", type="float")
     */
    private $costOfSales;

    
    /**
     * @var float $grossProfit
     *
     * @ORM\Column(name="grossProfit", type="float")
     */
    private $grossProfit;

    /**
     * @var float $discountsReceived
     *
     * @ORM\Column(name="discountsReceived", type="float")
     */
    private $discountsReceived;

    /**
     * @var float $decreaseBadDebts
     *
     * @ORM\Column(name="decreaseBadDebts", type="float")
     */
    private $decreaseBadDebts;

    /**
     * @var float $wagesAndSalaries
     *
     * @ORM\Column(name="wagesAndSalaries", type="float")
     */
    private $wagesAndSalaries;

    /**
     * @var float $lightAndHeat
     *
     * @ORM\Column(name="lightAndHeat", type="float")
     */
    private $lightAndHeat;

    /**
     * @var float $rent
     *
     * @ORM\Column(name="rent", type="float")
     */
    private $rent;

    /**
     * @var float $discountsAllowed
     *
     * @ORM\Column(name="discountsAllowed", type="float")
     */
    private $discountsAllowed;

    /**
     * @var float $telephone
     *
     * @ORM\Column(name="telephone", type="float")
     */
    private $telephone;

    /**
     * @var float $carriageOut
     *
     * @ORM\Column(name="carriageOut", type="float")
     */
    private $carriageOut;

    /**
     * @var float $generalExpenses
     *
     * @ORM\Column(name="generalExpenses", type="float")
     */
    private $generalExpenses;

    /**
     * @var float $provisionBadDebts
     *
     * @ORM\Column(name="provisionBadDebts", type="float")
     */
    private $provisionBadDebts;

    /**
     * @var float $debtsWrittenOff
     *
     * @ORM\Column(name="debtsWrittenOff", type="float")
     */
    private $debtsWrittenOff;

    /**
     * @var float $motorExpenses
     *
     * @ORM\Column(name="motorExpenses", type="float")
     */
    private $motorExpenses;

    /**
     * @var float $insurance
     *
     * @ORM\Column(name="insurance", type="float")
     */
    private $insurance;

    /**
     * @var float $depreciationCharge
     *
     * @ORM\Column(name="depreciationCharge", type="float")
     */
    private $depreciationCharge;


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
     * Set sales
     *
     * @param float $sales
     */
    public function setSales($sales)
    {
        $this->sales = $sales;
    }

    /**
     * Get sales
     *
     * @return float 
     */
    public function getSales()
    {
        return $this->sales;
    }

    /**
     * Set returns
     *
     * @param float $returns
     */
    public function setReturns($returns)
    {
        $this->returns = $returns;
    }

    /**
     * Get returns
     *
     * @return float 
     */
    public function getReturns()
    {
        return $this->returns;
    }
    
    
    /**
     * Set netSales
     *
     * @param float $netSales
     */
    public function setNetSales($netSales)
    {
        $this->netSales = $netSales;
    }

    /**
     * Get netSales
     *
     * @return float 
     */
    public function getNetSales()
    {
        return $this->netSales;
    }    
    

    /**
     * Set openingStock
     *
     * @param float $openingStock
     */
    public function setOpeningStock($openingStock)
    {
        $this->openingStock = $openingStock;
    }

    /**
     * Get openingStock
     *
     * @return float 
     */
    public function getOpeningStock()
    {
        return $this->openingStock;
    }

    /**
     * Set purchases
     *
     * @param float $purchases
     */
    public function setPurchases($purchases)
    {
        $this->purchases = $purchases;
    }

    /**
     * Get purchases
     *
     * @return float 
     */
    public function getPurchases()
    {
        return $this->purchases;
    }

    /**
     * Set carriageIn
     *
     * @param float $carriageIn
     */
    public function setCarriageIn($carriageIn)
    {
        $this->carriageIn = $carriageIn;
    }

    /**
     * Get carriageIn
     *
     * @return float 
     */
    public function getCarriageIn()
    {
        return $this->carriageIn;
    }

    /**
     * Set closingStock
     *
     * @param float $closingStock
     */
    public function setClosingStock($closingStock)
    {
        $this->closingStock = $closingStock;
    }

    /**
     * Get closingStock
     *
     * @return float 
     */
    public function getClosingStock()
    {
        return $this->closingStock;
    }

    
    
    
    /**
     * Set costOfSales
     *
     * @param float $costOfSales
     */
    public function setCostOfSales($costOfSales)
    {
        $this->costOfSales = $costOfSales;
    }

    /**
     * Get costOfSales
     *
     * @return float 
     */
    public function getCostOfSales()
    {
        return $this->costOfSales;
    }    
    
    
    
    
    /**
     * Set grossProfit
     *
     * @param float $grossProfit
     */
    public function setGrossProfit($grossProfit)
    {
        $this->grossProfit = $grossProfit;
    }

    /**
     * Get grossProfit
     *
     * @return float 
     */
    public function getGrossProfit()
    {
        return $this->grossProfit;
    }

    /**
     * Set discountsReceived
     *
     * @param float $discountsReceived
     */
    public function setDiscountsReceived($discountsReceived)
    {
        $this->discountsReceived = $discountsReceived;
    }

    /**
     * Get discountsReceived
     *
     * @return float 
     */
    public function getDiscountsReceived()
    {
        return $this->discountsReceived;
    }

    /**
     * Set decreaseBadDebts
     *
     * @param float $decreaseBadDebts
     */
    public function setDecreaseBadDebts($decreaseBadDebts)
    {
        $this->decreaseBadDebts = $decreaseBadDebts;
    }

    /**
     * Get decreaseBadDebts
     *
     * @return float 
     */
    public function getDecreaseBadDebts()
    {
        return $this->decreaseBadDebts;
    }

    /**
     * Set wagesAndSalaries
     *
     * @param float $wagesAndSalaries
     */
    public function setWagesAndSalaries($wagesAndSalaries)
    {
        $this->wagesAndSalaries = $wagesAndSalaries;
    }

    /**
     * Get wagesAndSalaries
     *
     * @return float 
     */
    public function getWagesAndSalaries()
    {
        return $this->wagesAndSalaries;
    }

    /**
     * Set lightAndHeat
     *
     * @param float $lightAndHeat
     */
    public function setLightAndHeat($lightAndHeat)
    {
        $this->lightAndHeat = $lightAndHeat;
    }

    /**
     * Get lightAndHeat
     *
     * @return float 
     */
    public function getLightAndHeat()
    {
        return $this->lightAndHeat;
    }

    /**
     * Set rent
     *
     * @param float $rent
     */
    public function setRent($rent)
    {
        $this->rent = $rent;
    }

    /**
     * Get rent
     *
     * @return float 
     */
    public function getRent()
    {
        return $this->rent;
    }

    /**
     * Set discountsAllowed
     *
     * @param float $discountsAllowed
     */
    public function setDiscountsAllowed($discountsAllowed)
    {
        $this->discountsAllowed = $discountsAllowed;
    }

    /**
     * Get discountsAllowed
     *
     * @return float 
     */
    public function getDiscountsAllowed()
    {
        return $this->discountsAllowed;
    }

    /**
     * Set telephone
     *
     * @param float $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Get telephone
     *
     * @return float 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set carriageOut
     *
     * @param float $carriageOut
     */
    public function setCarriageOut($carriageOut)
    {
        $this->carriageOut = $carriageOut;
    }

    /**
     * Get carriageOut
     *
     * @return float 
     */
    public function getCarriageOut()
    {
        return $this->carriageOut;
    }

    /**
     * Set generalExpenses
     *
     * @param float $generalExpenses
     */
    public function setGeneralExpenses($generalExpenses)
    {
        $this->generalExpenses = $generalExpenses;
    }

    /**
     * Get generalExpenses
     *
     * @return float 
     */
    public function getGeneralExpenses()
    {
        return $this->generalExpenses;
    }

    /**
     * Set provisionBadDebts
     *
     * @param float $provisionBadDebts
     */
    public function setProvisionBadDebts($provisionBadDebts)
    {
        $this->provisionBadDebts = $provisionBadDebts;
    }

    /**
     * Get provisionBadDebts
     *
     * @return float 
     */
    public function getProvisionBadDebts()
    {
        return $this->provisionBadDebts;
    }

    /**
     * Set debtsWrittenOff
     *
     * @param float $debtsWrittenOff
     */
    public function setDebtsWrittenOff($debtsWrittenOff)
    {
        $this->debtsWrittenOff = $debtsWrittenOff;
    }

    /**
     * Get debtsWrittenOff
     *
     * @return float 
     */
    public function getDebtsWrittenOff()
    {
        return $this->debtsWrittenOff;
    }

    /**
     * Set motorExpenses
     *
     * @param float $motorExpenses
     */
    public function setMotorExpenses($motorExpenses)
    {
        $this->motorExpenses = $motorExpenses;
    }

    /**
     * Get motorExpenses
     *
     * @return float 
     */
    public function getMotorExpenses()
    {
        return $this->motorExpenses;
    }

    /**
     * Set insurance
     *
     * @param float $insurance
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
    }

    /**
     * Get insurance
     *
     * @return float 
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * Set depreciationCharge
     *
     * @param float $depreciationCharge
     */
    public function setDepreciationCharge($depreciationCharge)
    {
        $this->depreciationCharge = $depreciationCharge;
    }

    /**
     * Get depreciationCharge
     *
     * @return float 
     */
    public function getDepreciationCharge()
    {
        return $this->depreciationCharge;
    }
}