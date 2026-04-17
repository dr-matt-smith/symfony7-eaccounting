<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\UserAddedTransaction
 *
 * @ORM\Table(name="user_added_transaction")
 * @ORM\Entity
 */
class UserAddedTransaction
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
     * @var date $transDate
     *
     * @ORM\Column(name="trans_date", type="date", nullable=true)
     */
    private $transDate;

    /**
     * @var string $details
     *
     * @ORM\Column(name="details", type="string", length=255, nullable=true)
     */
    private $details;

    /**
     * @var integer $bd
     *
     * @ORM\Column(name="bd", type="integer", nullable=true)
     */
    private $bd;

    /**
     * @var integer $cd
     *
     * @ORM\Column(name="cd", type="integer", nullable=true)
     */
    private $cd;

    /**
     * @var float $amount
     *
     * @ORM\Column(name="amount", type="float", nullable=true)
     */
    private $amount;

    /**
     * @var integer $debit
     *
     * @ORM\Column(name="debit", type="integer", nullable=true)
     */
    private $debit;

    /**
     * @var integer $credit
     *
     * @ORM\Column(name="credit", type="integer", nullable=true)
     */
    private $credit;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var TAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="t_account_id", referencedColumnName="id")
     * })
     */
    private $tAccount;

    /**
     * @var NtTransaction
     *
     * @ORM\ManyToOne(targetEntity="NtTransaction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nt_transaction_id", referencedColumnName="id")
     * })
     */
    private $ntTransaction;



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
     * Set transDate
     *
     * @param date $transDate
     */
    public function setTransDate($transDate)
    {
        $this->transDate = $transDate;
    }

    /**
     * Get transDate
     *
     * @return date 
     */
    public function getTransDate()
    {
        return $this->transDate;
    }

    /**
     * Set details
     *
     * @param string $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * Get details
     *
     * @return string 
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set bd
     *
     * @param integer $bd
     */
    public function setBd($bd)
    {
        $this->bd = $bd;
    }

    /**
     * Get bd
     *
     * @return integer 
     */
    public function getBd()
    {
        return $this->bd;
    }

    /**
     * Set cd
     *
     * @param integer $cd
     */
    public function setCd($cd)
    {
        $this->cd = $cd;
    }

    /**
     * Get cd
     *
     * @return integer 
     */
    public function getCd()
    {
        return $this->cd;
    }

    /**
     * Set amount
     *
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Get amount
     *
     * @return float 
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
     * Set credit
     *
     * @param integer $credit
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;
    }

    /**
     * Get credit
     *
     * @return integer 
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set user
     *
     * @param Itb\EaccountingBundle\Entity\User $user
     */
    public function setUser(\Itb\EaccountingBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Itb\EaccountingBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set tAccount
     *
     * @param Itb\EaccountingBundle\Entity\TAccount $tAccount
     */
    public function setTAccount(\Itb\EaccountingBundle\Entity\TAccount $tAccount)
    {
        $this->tAccount = $tAccount;
    }

    /**
     * Get tAccount
     *
     * @return Itb\EaccountingBundle\Entity\TAccount 
     */
    public function getTAccount()
    {
        return $this->tAccount;
    }

    /**
     * Set ntTransaction
     *
     * @param Itb\EaccountingBundle\Entity\NtTransaction $ntTransaction
     */
    public function setNtTransaction(\Itb\EaccountingBundle\Entity\NtTransaction $ntTransaction)
    {
        $this->ntTransaction = $ntTransaction;
    }

    /**
     * Get ntTransaction
     *
     * @return Itb\EaccountingBundle\Entity\NtTransaction 
     */
    public function getNtTransaction()
    {
        return $this->ntTransaction;
    }
}