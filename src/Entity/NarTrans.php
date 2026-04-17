<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\NarTrans
 *
 * @ORM\Table(name="nar_trans")
 * @ORM\Entity
 */
class NarTrans
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
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
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
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
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