<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\TrialBalance
 *
 * @ORM\Table(name="trial_balance")
 * @ORM\Entity
 */
class TrialBalance
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
     * @var date $balDate
     *
     * @ORM\Column(name="bal_date", type="date", nullable=true)
     */
    private $balDate;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var CaseStudy
     *
     * @ORM\ManyToOne(targetEntity="CaseStudy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="case_stydy_id", referencedColumnName="id")
     * })
     */
    private $caseStydy;



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
     * Set balDate
     *
     * @param date $balDate
     */
    public function setBalDate($balDate)
    {
        $this->balDate = $balDate;
    }

    /**
     * Get balDate
     *
     * @return date 
     */
    public function getBalDate()
    {
        return $this->balDate;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set caseStydy
     *
     * @param Itb\EaccountingBundle\Entity\CaseStudy $caseStydy
     */
    public function setCaseStydy(\Itb\EaccountingBundle\Entity\CaseStudy $caseStydy)
    {
        $this->caseStydy = $caseStydy;
    }

    /**
     * Get caseStydy
     *
     * @return Itb\EaccountingBundle\Entity\CaseStudy 
     */
    public function getCaseStydy()
    {
        return $this->caseStydy;
    }
}