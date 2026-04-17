<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\TrialBalanceAccount
 *
 * @ORM\Table(name="trial_balance_account")
 * @ORM\Entity
 */
class TrialBalanceAccount
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
     * @var integer $accNumber
     *
     * @ORM\Column(name="acc_number", type="integer", nullable=true)
     */
    private $accNumber;

    /**
     * @var string $accName
     *
     * @ORM\Column(name="acc_name", type="string", length=255, nullable=true)
     */
    private $accName;

    /**
     * @var integer $amount
     *
     * @ORM\Column(name="amount", type="integer", nullable=true)
     */
    private $amount;

    /**
     * @var integer $debit
     *
     * @ORM\Column(name="debit", type="integer", nullable=true)
     */
    private $debit;

    /**
     * @var TrialBalanceLedger
     *
     * @ORM\ManyToOne(targetEntity="TrialBalanceLedger")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trial_balance_ledger_id", referencedColumnName="id")
     * })
     */
    private $trialBalanceLedger;



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
     * Set accNumber
     *
     * @param integer $accNumber
     */
    public function setAccNumber($accNumber)
    {
        $this->accNumber = $accNumber;
    }

    /**
     * Get accNumber
     *
     * @return integer 
     */
    public function getAccNumber()
    {
        return $this->accNumber;
    }

    /**
     * Set accName
     *
     * @param string $accName
     */
    public function setAccName($accName)
    {
        $this->accName = $accName;
    }

    /**
     * Get accName
     *
     * @return string 
     */
    public function getAccName()
    {
        return $this->accName;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set debit
     *
     * @param integer $debit
     */
    public function setDebit($debit)
    {
        $this->debit = $debit;
    }

    /**
     * Get debit
     *
     * @return integer 
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * Set trialBalanceLedger
     *
     * @param Itb\EaccountingBundle\Entity\TrialBalanceLedger $trialBalanceLedger
     */
    public function setTrialBalanceLedger(\Itb\EaccountingBundle\Entity\TrialBalanceLedger $trialBalanceLedger)
    {
        $this->trialBalanceLedger = $trialBalanceLedger;
    }

    /**
     * Get trialBalanceLedger
     *
     * @return Itb\EaccountingBundle\Entity\TrialBalanceLedger 
     */
    public function getTrialBalanceLedger()
    {
        return $this->trialBalanceLedger;
    }
}