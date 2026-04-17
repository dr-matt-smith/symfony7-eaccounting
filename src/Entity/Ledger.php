<?php

namespace Itb\EaccountingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itb\EaccountingBundle\Entity\Ledger
 *
 * @ORM\Table(name="ledger")
 * @ORM\Entity(repositoryClass="Itb\EaccountingBundle\Repository\LedgerRepository")

 */
class Ledger
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