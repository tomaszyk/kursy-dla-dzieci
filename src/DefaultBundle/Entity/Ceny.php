<?php

namespace DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ceny
 *
 * @ORM\Table(name="ceny")
 * @ORM\Entity(repositoryClass="DefaultBundle\Repository\CenyRepository")
 */
class Ceny
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cena", type="integer")
     */
    private $cena;
    
    /**
     * @var int
     *
     * @ORM\Column(name="cenaTotal", type="integer")
     */
    private $cenaTotal;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cena
     *
     * @param integer $cena
     *
     * @return Ceny
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return int
     */
    public function getCena()
    {
        return $this->cena;
    }
    
    /**
     * Set cenaTotal
     *
     * @param integer $cenaTotal
     *
     * @return Ceny
     */
    public function setCenaTotal($cenaTotal)
    {
        $this->cenaTotal = $cenaTotal;

        return $this;
    }

    /**
     * Get cenaTotal
     *
     * @return int
     */
    public function getCenaTotal()
    {
        return $this->cenaTotal;
    }
}

