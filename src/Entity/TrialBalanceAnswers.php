<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\TrialBalanceAnswers
 *
 * @ORM\Table(name="trial_balance_answers")
 * @ORM\Entity
 */
class TrialBalanceAnswers
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
     * @var float $answerDebit
     *
     * @ORM\Column(name="answer_debit", type="float", nullable=true)
     */
    private $answerDebit;

    /**
     * @var float $answerCredit
     *
     * @ORM\Column(name="answer_credit", type="float", nullable=true)
     */
    private $answerCredit;

    /**
     * @var float $answerNetDebit
     *
     * @ORM\Column(name="answer_net_debit", type="float", nullable=true)
     */
    private $answerNetDebit;

    /**
     * @var float $answerNetCredit
     *
     * @ORM\Column(name="answer_net_credit", type="float", nullable=true)
     */
    private $answerNetCredit;

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
     * Set answerDebit
     *
     * @param float $answerDebit
     */
    public function setAnswerDebit($answerDebit)
    {
        $this->answerDebit = $answerDebit;
    }

    /**
     * Get answerDebit
     *
     * @return float 
     */
    public function getAnswerDebit()
    {
        return $this->answerDebit;
    }

    /**
     * Set answerCredit
     *
     * @param float $answerCredit
     */
    public function setAnswerCredit($answerCredit)
    {
        $this->answerCredit = $answerCredit;
    }

    /**
     * Get answerCredit
     *
     * @return float 
     */
    public function getAnswerCredit()
    {
        return $this->answerCredit;
    }

    /**
     * Set answerNetDebit
     *
     * @param float $answerNetDebit
     */
    public function setAnswerNetDebit($answerNetDebit)
    {
        $this->answerNetDebit = $answerNetDebit;
    }

    /**
     * Get answerNetDebit
     *
     * @return float 
     */
    public function getAnswerNetDebit()
    {
        return $this->answerNetDebit;
    }

    /**
     * Set answerNetCredit
     *
     * @param float $answerNetCredit
     */
    public function setAnswerNetCredit($answerNetCredit)
    {
        $this->answerNetCredit = $answerNetCredit;
    }

    /**
     * Get answerNetCredit
     *
     * @return float 
     */
    public function getAnswerNetCredit()
    {
        return $this->answerNetCredit;
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