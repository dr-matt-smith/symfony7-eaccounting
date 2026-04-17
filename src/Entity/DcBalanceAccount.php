<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\DcBalanceAccount
 *
 * @ORM\Table(name="dc_balance_account")
 * @ORM\Entity
 */
class DcBalanceAccount
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
     * @var string $accNumber
     *
     * @ORM\Column(name="acc_number", type="string", length=255, nullable=true)
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
     * @var DcBalanceLedger
     *
     * @ORM\ManyToOne(targetEntity="DcBalanceLedger")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dc_balance_ledger_id", referencedColumnName="id")
     * })
     */
    private $dcBalanceLedger;



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
     * @param string $accNumber
     */
    public function setAccNumber($accNumber)
    {
        $this->accNumber = $accNumber;
    }

    /**
     * Get accNumber
     *
     * @return string 
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
     * Set dcBalanceLedger
     *
     * @param Itb\EaccountingBundle\Entity\DcBalanceLedger $dcBalanceLedger
     */
    public function setDcBalanceLedger(\Itb\EaccountingBundle\Entity\DcBalanceLedger $dcBalanceLedger)
    {
        $this->dcBalanceLedger = $dcBalanceLedger;
    }

    /**
     * Get dcBalanceLedger
     *
     * @return Itb\EaccountingBundle\Entity\DcBalanceLedger 
     */
    public function getDcBalanceLedger()
    {
        return $this->dcBalanceLedger;
    }
}