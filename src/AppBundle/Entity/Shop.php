<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="shops")
 */
class Shop
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Party",
     *      mappedBy="shop",
     *      orphanRemoval=true,
     *     cascade={"persist"})
     */
    private $party;

    public function __construct()
    {
        $this->party = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getParty()
    {
        return $this->party;
    }

    public function setParty($party)
    {
        $this->party = $party;
    }
}