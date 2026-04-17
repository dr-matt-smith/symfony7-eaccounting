<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\UserAccountBalance
 *
 * @ORM\Table(name="user_account_balance")
 * @ORM\Entity
 */
class UserAccountBalance
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
     * @var float $totalDebit
     *
     * @ORM\Column(name="total_debit", type="float", nullable=true)
     */
    private $totalDebit;

    /**
     * @var float $totalCredit
     *
     * @ORM\Column(name="total_credit", type="float", nullable=true)
     */
    private $totalCredit;

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
     * Set totalDebit
     *
     * @param float $totalDebit
     */
    public function setTotalDebit($totalDebit)
    {
        $this->totalDebit = $totalDebit;
    }

    /**
     * Get totalDebit
     *
     * @return float 
     */
    public function getTotalDebit()
    {
        return $this->totalDebit;
    }

    /**
     * Set totalCredit
     *
     * @param float $totalCredit
     */
    public function setTotalCredit($totalCredit)
    {
        $this->totalCredit = $totalCredit;
    }

    /**
     * Get totalCredit
     *
     * @return float 
     */
    public function getTotalCredit()
    {
        return $this->totalCredit;
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