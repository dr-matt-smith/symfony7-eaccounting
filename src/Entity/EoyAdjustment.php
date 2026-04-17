<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\EoyAdjustment
 *
 * @ORM\Table(name="eoy_adjustment")
 * @ORM\Entity
 */
class EoyAdjustment
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var text $details
     *
     * @ORM\Column(name="details", type="text", nullable=true)
     */
    private $details;

    /**
     * @var text notes
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var integer $amount
     *
     * @ORM\Column(name="amount",  type="integer", nullable=false)
     */
    private $amount;
    
    /**
     * @var integer $debitAmount
     *
     * @ORM\Column(name="debit_amount",  type="integer", nullable=false)
     */
    private $debitAmount;
    
    /**
     * @var integer $creditAmount
     *
     * @ORM\Column(name="credit_amount",  type="integer", nullable=false)
     */
    private $creditAmount;

    /**
     * @var EoyAdjType
     *
     * @ORM\ManyToOne(targetEntity="EoyAdjType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="eoy_adj_type_id", referencedColumnName="id")
     * })
     */
    private $eoyAdjType;


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
     * @var DebitTAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="debit_t_account_id", referencedColumnName="id")
     * })
     */
    private $debitTAccount;
    
    /**
     * @var CreditTAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="credit_t_account_id", referencedColumnName="id")
     * })
     */
    private $creditTAccount;
    
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set details
     *
     * @param text $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * Get details
     *
     * @return text 
     */
    public function getDetails()
    {
        return $this->details;
    }
    
    /**
     * Set notes
     *
     * @param text $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Get notes
     *
     * @return text 
     */
    public function getNotes()
    {
        return $this->notes;
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
     * Set eoyAdjType
     *
     * @param Itb\EaccountingBundle\Entity\EoyAdjType $eoyAdjType
     */
    public function setEoyAdjType(\Itb\EaccountingBundle\Entity\EoyAdjType $eoyAdjType)
    {
        $this->eoyAdjType = $eoyAdjType;
    }

    /**
     * Get eoyAdjType
     *
     * @return Itb\EaccountingBundle\Entity\EoyAdjType 
     */
    public function getEoyAdjType()
    {
        return $this->eoyAdjType;
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
     * Set debitTAccount
     *
     * @param Itb\EaccountingBundle\Entity\TAccount $debitTAccount
     */
    public function setDebitTAccount(\Itb\EaccountingBundle\Entity\TAccount $debitTAccount)
    {
        $this->debitTAccount = $debitTAccount;
    }

    /**
     * Get debitTAccount
     *
     * @return Itb\EaccountingBundle\Entity\TAccount 
     */
    public function getDebitTAccount()
    {
        return $this->debitTAccount;
    }    
    
    
    /**
     * Set creditTAccount
     *
     * @param Itb\EaccountingBundle\Entity\TAccount $creditTAccount
     */
    public function setCreditTAccount(\Itb\EaccountingBundle\Entity\TAccount $creditTAccount)
    {
        $this->creditTAccount = $creditTAccount;
    }

    /**
     * Get creditTAccount
     *
     * @return Itb\EaccountingBundle\Entity\TAccount 
     */
    public function getCreditTAccount()
    {
        return $this->creditTAccount;
    }    

    
    /**
     * Set debitAmount
     *
     * @param integer $debitAmount
     */
    public function setDebitAmount($debitAmount)
    {
        $this->debitAmount = $debitAmount;
    }

    /**
     * Get debitAmount
     *
     * @return integer 
     */
    public function getDebitAmount()
    {
        return $this->debitAmount;
    }

    
    /**
     * Set creditAmount
     *
     * @param integer $creditAmount
     */
    public function setCreditAmount($cfreditAmount)
    {
        $this->cfreditAmount = $creditAmount;
    }

    /**
     * Get creditAmount
     *
     * @return integer 
     */
    public function getCreditAmount()
    {
        return $this->creditAmount;
    }

    
    
}