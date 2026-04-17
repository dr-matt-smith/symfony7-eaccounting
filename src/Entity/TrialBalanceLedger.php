<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\TrialBalanceLedger
 *
 * @ORM\Table(name="trial_balance_ledger")
 * @ORM\Entity
 */
class TrialBalanceLedger
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $orderNumber
     *
     * @ORM\Column(name="order_number", type="integer", nullable=true)
     */
    private $orderNumber;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var TrialBalance
     *
     * @ORM\ManyToOne(targetEntity="TrialBalance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trial_balance_id", referencedColumnName="id")
     * })
     */
    private $trialBalance;

    /**
     * @var TrialBalanceLedger
     *
     * @ORM\ManyToOne(targetEntity="TrialBalanceLedger")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_ledger_id", referencedColumnName="id")
     * })
     */
    private $parentLedger;



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
     * Set orderNumber
     *
     * @param integer $orderNumber
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * Get orderNumber
     *
     * @return integer 
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set trialBalance
     *
     * @param Itb\EaccountingBundle\Entity\TrialBalance $trialBalance
     */
    public function setTrialBalance(\Itb\EaccountingBundle\Entity\TrialBalance $trialBalance)
    {
        $this->trialBalance = $trialBalance;
    }

    /**
     * Get trialBalance
     *
     * @return Itb\EaccountingBundle\Entity\TrialBalance 
     */
    public function getTrialBalance()
    {
        return $this->trialBalance;
    }

    /**
     * Set parentLedger
     *
     * @param Itb\EaccountingBundle\Entity\TrialBalanceLedger $parentLedger
     */
    public function setParentLedger(\Itb\EaccountingBundle\Entity\TrialBalanceLedger $parentLedger)
    {
        $this->parentLedger = $parentLedger;
    }

    /**
     * Get parentLedger
     *
     * @return Itb\EaccountingBundle\Entity\TrialBalanceLedger 
     */
    public function getParentLedger()
    {
        return $this->parentLedger;
    }
}