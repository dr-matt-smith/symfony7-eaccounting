<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\EoyAdjWork
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EoyAdjWork
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var Adjustment
     *
     * @ORM\ManyToOne(targetEntity="EoyAdjustment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="adjustment", referencedColumnName="id")
     * })
     */
    private $adjustment;

    /**
     * @var $DebitTAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="debitTAccount", referencedColumnName="id")
     * })
     */
    private $debitTAccount;

    /**
     * @var $CreditTAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creditTAccount", referencedColumnName="id")
     * })
     */
    private $creditTAccount;

    /**
     * @var float $debitAmount
     *
     * @ORM\Column(name="debitAmount", type="float")
     */
    private $debitAmount;

    /**
     * @var float $creditAmount
     *
     * @ORM\Column(name="creditAmount", type="float")
     */
    private $creditAmount;


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
     * Set adjustment
     *
     * @param integer $adjustment
     */
    public function setAdjustment($adjustment)
    {
        $this->adjustment = $adjustment;
    }

    /**
     * Get adjustment
     *
     * @return integer 
     */
    public function getAdjustment()
    {
        return $this->adjustment;
    }

    /**
     * Set debitTAccount
     *
     * @param integer $debitTAccount
     */
    public function setDebitTAccount($debitTAccount)
    {
        $this->debitTAccount = $debitTAccount;
    }

    /**
     * Get debitTAccount
     *
     * @return integer 
     */
    public function getDebitTAccount()
    {
        return $this->debitTAccount;
    }

    /**
     * Set creditTAccount
     *
     * @param integer $creditTAccount
     */
    public function setCreditTAccount($creditTAccount)
    {
        $this->creditTAccount = $creditTAccount;
    }

    /**
     * Get creditTAccount
     *
     * @return integer 
     */
    public function getCreditTAccount()
    {
        return $this->creditTAccount;
    }

    /**
     * Set debitAmount
     *
     * @param float $debitAmount
     */
    public function setDebitAmount($debitAmount)
    {
        $this->debitAmount = $debitAmount;
    }

    /**
     * Get debitAmount
     *
     * @return float 
     */
    public function getDebitAmount()
    {
        return $this->debitAmount;
    }

    /**
     * Set creditAmount
     *
     * @param float $creditAmount
     */
    public function setCreditAmount($creditAmount)
    {
        $this->creditAmount = $creditAmount;
    }

    /**
     * Get creditAmount
     *
     * @return float 
     */
    public function getCreditAmount()
    {
        return $this->creditAmount;
    }
}