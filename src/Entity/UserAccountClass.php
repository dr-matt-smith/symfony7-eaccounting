<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\UserAccountClass
 *
 * @ORM\Table(name="user_account_class")
 * @ORM\Entity
 */
class UserAccountClass
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
     * @var TAccount
     *
     * @ORM\ManyToOne(targetEntity="TAccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="t_account_id", referencedColumnName="id")
     * })
     */
    private $tAccount;

    /**
     * @var AccountClass
     *
     * @ORM\ManyToOne(targetEntity="AccountClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_class_id", referencedColumnName="id")
     * })
     */
    private $accountClass;



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
     * Set accountClass
     *
     * @param Itb\EaccountingBundle\Entity\AccountClass $accountClass
     */
    public function setAccountClass(\Itb\EaccountingBundle\Entity\AccountClass $accountClass)
    {
        $this->accountClass = $accountClass;
    }

    /**
     * Get accountClass
     *
     * @return Itb\EaccountingBundle\Entity\AccountClass 
     */
    public function getAccountClass()
    {
        return $this->accountClass;
    }
}