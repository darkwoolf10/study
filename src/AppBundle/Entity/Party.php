<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="partys")
 */
class Party
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $toy;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min=0)
     * @ORM\Column(type="integer")
     */
    private $price;
    /**
     * @Assert\NotBlank()
     * @Assert\Range(min=0)
     * @ORM\Column(type="integer")
     */
    private $quntity;

    /**
     * @ORM\ManyToOne(targetEntity="Shop", inversedBy="party")
     */
    private $shop;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getToy()
    {
        return $this->toy;
    }

    public function setToy($toy)
    {
        $this->toy = $toy;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQuntity()
    {
        return $this->quntity;
    }

    public function setQuntity($quntity)
    {
        $this->quntity = $quntity;
    }

    public function getShop()
    {
        return $this->shop;
    }

    public function setShop($shop)
    {
        $this->shop = $shop;
    }
}