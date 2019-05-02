<?php

namespace DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wiadomosc
 *
 * @ORM\Table(name="wiadomosc")
 * @ORM\Entity(repositoryClass="DefaultBundle\Repository\WiadomoscRepository")
 */
class Wiadomosc
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
     * @var string
     *
     * @ORM\Column(name="imie", type="string", length=255)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="wiadomosc", type="text")
     */
    private $wiadomosc;

    /**
     * @var array
     *
     * @ORM\Column(name="zgoda", type="array")
     */
    private $zgoda;


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
     * Set imie
     *
     * @param string $imie
     *
     * @return Wiadomosc
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Wiadomosc
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set wiadomosc
     *
     * @param string $wiadomosc
     *
     * @return Wiadomosc
     */
    public function setWiadomosc($wiadomosc)
    {
        $this->wiadomosc = $wiadomosc;

        return $this;
    }

    /**
     * Get wiadomosc
     *
     * @return string
     */
    public function getWiadomosc()
    {
        return $this->wiadomosc;
    }

    /**
     * Set zgoda
     *
     * @param array $zgoda
     *
     * @return Wiadomosc
     */
    public function setZgoda($zgoda)
    {
        $this->zgoda = $zgoda;

        return $this;
    }

    /**
     * Get zgoda
     *
     * @return array
     */
    public function getZgoda()
    {
        return $this->zgoda;
    }
}

