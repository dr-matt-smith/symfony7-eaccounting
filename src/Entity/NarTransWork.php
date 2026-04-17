<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\NarTransWork
 *
 * @ORM\Table(name="nar_trans_work")
 * @ORM\Entity
 */
class NarTransWork
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

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
     * @var TAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="t_acc_debit_id", referencedColumnName="id")
     * })
     */
    private $tAccDebit;

    /**
     * @var TAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="t_acc_credit_id", referencedColumnName="id")
     * })
     */
    private $tAccCredit;

    /**
     * @var TAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acc_debit_id", referencedColumnName="id")
     * })
     */
    private $accDebit;

    /**
     * @var TAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acc_credit_id", referencedColumnName="id")
     * })
     */
    private $accCredit;



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

    /**
     * Set tAccDebit
     *
     * @param Itb\EaccountingBundle\Entity\TAccount $tAccDebit
     */
    public function setTAccDebit(\Itb\EaccountingBundle\Entity\TAccount $tAccDebit)
    {
        $this->tAccDebit = $tAccDebit;
    }

    /**
     * Get tAccDebit
     *
     * @return Itb\EaccountingBundle\Entity\TAccount 
     */
    public function getTAccDebit()
    {
        return $this->tAccDebit;
    }

    /**
     * Set tAccCredit
     *
     * @param Itb\EaccountingBundle\Entity\TAccount $tAccCredit
     */
    public function setTAccCredit(\Itb\EaccountingBundle\Entity\TAccount $tAccCredit)
    {
        $this->tAccCredit = $tAccCredit;
    }

    /**
     * Get tAccCredit
     *
     * @return Itb\EaccountingBundle\Entity\TAccount 
     */
    public function getTAccCredit()
    {
        return $this->tAccCredit;
    }

    /**
     * Set accDebit
     *
     * @param Itb\EaccountingBundle\Entity\TAccount $accDebit
     */
    public function setAccDebit(\Itb\EaccountingBundle\Entity\TAccount $accDebit)
    {
        $this->accDebit = $accDebit;
    }

    /**
     * Get accDebit
     *
     * @return Itb\EaccountingBundle\Entity\TAccount 
     */
    public function getAccDebit()
    {
        return $this->accDebit;
    }

    /**
     * Set accCredit
     *
     * @param Itb\EaccountingBundle\Entity\TAccount $accCredit
     */
    public function setAccCredit(\Itb\EaccountingBundle\Entity\TAccount $accCredit)
    {
        $this->accCredit = $accCredit;
    }

    /**
     * Get accCredit
     *
     * @return Itb\EaccountingBundle\Entity\TAccount 
     */
    public function getAccCredit()
    {
        return $this->accCredit;
    }
    

    /**
     * clear tAccDebit
     *
     */
    public function clearTAccDebit()
    {
        $this->tAccDebit = NULL;
    }


    /**
     * clear tAcCredit
     *
     */
    public function clearTAccCredit()
    {
        $this->tAccCredit = NULL;
    }


    /**
     * clear accDebit
     *
     */
    public function clearAccDebit()
    {
        $this->accDebit = NULL;
    }


    /**
     * clear accCredit
     *
     */
    public function clearAccCredit()
    {
        $this->accCredit= NULL;
    }    
}