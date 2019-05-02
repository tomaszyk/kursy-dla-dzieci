<?php

namespace DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Licznik
 *
 * @ORM\Table(name="licznik")
 * @ORM\Entity(repositoryClass="DefaultBundle\Repository\LicznikRepository")
 */
class Licznik
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
     * @ORM\Column(name="licznik", type="integer")
     */
    private $licznik;


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
     * Set licznik
     *
     * @param integer $licznik
     *
     * @return Licznik
     */
    public function setLicznik($licznik)
    {
        $this->licznik = $licznik;

        return $this;
    }

    /**
     * Get licznik
     *
     * @return int
     */
    public function getLicznik()
    {
        return $this->licznik;
    }
}

