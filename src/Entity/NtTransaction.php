<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\NtTransaction
 *
 * @ORM\Table(name="nt_transaction")
 * @ORM\Entity
 */
class NtTransaction
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
     * @var integer $narTransId
     *
     * @ORM\Column(name="nar_trans_id", type="integer", nullable=true)
     */
    private $narTransId;

    /**
     * @var date $transDate
     *
     * @ORM\Column(name="trans_date", type="date", nullable=true)
     */
    private $transDate;

    /**
     * @var string $action
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     */
    private $action;

    /**
     * @var string $accName
     *
     * @ORM\Column(name="acc_name", type="string", length=255, nullable=true)
     */
    private $accName;

    /**
     * @var float $amount
     *
     * @ORM\Column(name="amount", type="float", nullable=true)
     */
    private $amount;

    /**
     * @var string $note
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var float $discountAmount
     *
     * @ORM\Column(name="discount_amount", type="float", nullable=true)
     */
    private $discountAmount;

    /**
     * @var integer $answerDebitId
     *
     * @ORM\Column(name="answer_debit_id", type="integer", nullable=true)
     */
    private $answerDebitId;

    /**
     * @var integer $answerCreditId
     *
     * @ORM\Column(name="answer_credit_id", type="integer", nullable=true)
     */
    private $answerCreditId;

    /**
     * @var integer $answerDebit2Id
     *
     * @ORM\Column(name="answer_debit2_id", type="integer", nullable=true)
     */
    private $answerDebit2Id;

    /**
     * @var integer $answerCredit2Id
     *
     * @ORM\Column(name="answer_credit2_id", type="integer", nullable=true)
     */
    private $answerCredit2Id;



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
     * Set narTransId
     *
     * @param integer $narTransId
     */
    public function setNarTransId($narTransId)
    {
        $this->narTransId = $narTransId;
    }

    /**
     * Get narTransId
     *
     * @return integer 
     */
    public function getNarTransId()
    {
        return $this->narTransId;
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
     * Set action
     *
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Get action
     *
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
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
     * Set note
     *
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set discountAmount
     *
     * @param float $discountAmount
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->discountAmount = $discountAmount;
    }

    /**
     * Get discountAmount
     *
     * @return float 
     */
    public function getDiscountAmount()
    {
        return $this->discountAmount;
    }

    /**
     * Set answerDebitId
     *
     * @param integer $answerDebitId
     */
    public function setAnswerDebitId($answerDebitId)
    {
        $this->answerDebitId = $answerDebitId;
    }

    /**
     * Get answerDebitId
     *
     * @return integer 
     */
    public function getAnswerDebitId()
    {
        return $this->answerDebitId;
    }

    /**
     * Set answerCreditId
     *
     * @param integer $answerCreditId
     */
    public function setAnswerCreditId($answerCreditId)
    {
        $this->answerCreditId = $answerCreditId;
    }

    /**
     * Get answerCreditId
     *
     * @return integer 
     */
    public function getAnswerCreditId()
    {
        return $this->answerCreditId;
    }

    /**
     * Set answerDebit2Id
     *
     * @param integer $answerDebit2Id
     */
    public function setAnswerDebit2Id($answerDebit2Id)
    {
        $this->answerDebit2Id = $answerDebit2Id;
    }

    /**
     * Get answerDebit2Id
     *
     * @return integer 
     */
    public function getAnswerDebit2Id()
    {
        return $this->answerDebit2Id;
    }

    /**
     * Set answerCredit2Id
     *
     * @param integer $answerCredit2Id
     */
    public function setAnswerCredit2Id($answerCredit2Id)
    {
        $this->answerCredit2Id = $answerCredit2Id;
    }

    /**
     * Get answerCredit2Id
     *
     * @return integer 
     */
    public function getAnswerCredit2Id()
    {
        return $this->answerCredit2Id;
    }
}