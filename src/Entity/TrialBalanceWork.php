<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\TrialBalanceWork
 *
 * @ORM\Table(name="trial_balance_work")
 * @ORM\Entity(repositoryClass="Itb\EaccountingBundle\Repository\TrialBalanceWorkRepository")
 */
class TrialBalanceWork
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
     * @var float $netDebit
     *
     * @ORM\Column(name="balance", type="float", nullable=true)
     */
    private $balance;

    /**
     * @var integer $netDebit
     *
     * @ORM\Column(name="net_debit", type="integer", nullable=false)
     */
    private $netDebit;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set balance
     *
     * @param float $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * Get balance
     *
     * @return float 
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set netDebit
     *
     * @param integer $netDebit
     */
    public function setNetDebit($netDebit)
    {
        $this->netDebit = $netDebit;
    }

    /**
     * Get netDebit
     *
     * @return integer 
     */
    public function getNetDebit()
    {
        return $this->netDebit;
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
}