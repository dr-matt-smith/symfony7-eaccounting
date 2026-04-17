<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\TAccount
 *
 * @ORM\Table(name="t_account")
 * @ORM\Entity(repositoryClass="Itb\EaccountingBundle\Repository\TAccountRepository")
 */
class TAccount
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
     * @ORM\Column(name="acc_number", type="string", length=16, nullable=true)
     */
    private $accNumber;

    /**
     * @var string $accName
     *
     * @ORM\Column(name="acc_name", type="string", length=255, nullable=true)
     */
    private $accName;

    /**
     * @var date $dateClosedOff
     *
     * @ORM\Column(name="date_closed_off", type="date", nullable=true)
     */
    private $dateClosedOff;

    /**
     * @var integer $closingBalance
     *
     * @ORM\Column(name="closing_balance", type="integer", nullable=true)
     */
    private $closingBalance;

    /**
     * @var integer $debit
     *
     * @ORM\Column(name="debit", type="integer", nullable=true)
     */
    private $debit;

    /**
     * @var Ledger
     *
     * @ORM\ManyToOne(targetEntity="Ledger")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ledger_id", referencedColumnName="id")
     * })
     */
    private $ledger;

    /**
     * @var AccountClass
     *
     * @ORM\ManyToOne(targetEntity="AccountClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="class_id", referencedColumnName="id")
     * })
     */
    private $class;



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
     * Set dateClosedOff
     *
     * @param date $dateClosedOff
     */
    public function setDateClosedOff($dateClosedOff)
    {
        $this->dateClosedOff = $dateClosedOff;
    }

    /**
     * Get dateClosedOff
     *
     * @return date 
     */
    public function getDateClosedOff()
    {
        return $this->dateClosedOff;
    }

    /**
     * Set closingBalance
     *
     * @param integer $closingBalance
     */
    public function setClosingBalance($closingBalance)
    {
        $this->closingBalance = $closingBalance;
    }

    /**
     * Get closingBalance
     *
     * @return integer 
     */
    public function getClosingBalance()
    {
        return $this->closingBalance;
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
     * Set ledger
     *
     * @param Itb\EaccountingBundle\Entity\Ledger $ledger
     */
    public function setLedger(\Itb\EaccountingBundle\Entity\Ledger $ledger)
    {
        $this->ledger = $ledger;
    }

    /**
     * Get ledger
     *
     * @return Itb\EaccountingBundle\Entity\Ledger 
     */
    public function getLedger()
    {
        return $this->ledger;
    }

    /**
     * Set class
     *
     * @param Itb\EaccountingBundle\Entity\AccountClass $class
     */
    public function setClass(\Itb\EaccountingBundle\Entity\AccountClass $class)
    {
        $this->class = $class;
    }

    /**
     * Get class
     *
     * @return Itb\EaccountingBundle\Entity\AccountClass 
     */
    public function getClass()
    {
        return $this->class;
    }
}