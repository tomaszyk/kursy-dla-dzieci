<?php

namespace DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Kursy
 *
 * @ORM\Table(name="kursy")
 * @ORM\Entity(repositoryClass="DefaultBundle\Repository\KursyRepository")
 */
class Kursy
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
     * @ORM\Column(name="grupa", type="string", length=255)
     */
    private $grupa;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwa", type="string", length=255)
     */
    private $nazwa;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=255)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="dzienigodzina", type="string", length=255)
     */
    private $dzienigodzina;

    /**
     * @var string
     *
     * @ORM\Column(name="poczatekkursu", type="string", length=255)
     */
    private $poczatekkursu;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="mapa", type="string", length=255)
     */
    private $mapa;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="liczbakursantow", type="integer")
     */
    private $liczbakursantow;
    
   

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
     * Set grupa
     *
     * @param string $grupa
     *
     * @return Kursy
     */
    public function setGrupa($grupa)
    {
        $this->grupa = $grupa;

        return $this;
    }

    /**
     * Get grupa
     *
     * @return string
     */
    public function getGrupa()
    {
        return $this->grupa;
    }

    /**
     * Set nazwa
     *
     * @param string $nazwa
     *
     * @return Kursy
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * Set adres
     *
     * @param string $adres
     *
     * @return Kursy
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set dzienigodzina
     *
     * @param string $dzienigodzina
     *
     * @return Kursy
     */
    public function setDzienigodzina($dzienigodzina)
    {
        $this->dzienigodzina = $dzienigodzina;

        return $this;
    }

    /**
     * Get dzienigodzina
     *
     * @return string
     */
    public function getDzienigodzina()
    {
        return $this->dzienigodzina;
    }

    /**
     * Set poczatekkursu
     *
     * @param string $poczatekkursu
     *
     * @return Kursy
     */
    public function setPoczatekkursu($poczatekkursu)
    {
        $this->poczatekkursu = $poczatekkursu;

        return $this;
    }

    /**
     * Get poczatekkursu
     *
     * @return string
     */
    public function getPoczatekkursu()
    {
        return $this->poczatekkursu;
    }
    
    
        /**
     * Set mapa
     *
     * @param string $mapa
     *
     * @return Kursy
     */
    public function setMapa($mapa)
    {
        $this->mapa = $mapa;

        return $this;
    }

    /**
     * Get mapa
     *
     * @return string
     */
    public function getMapa()
    {
        return $this->mapa;
    }
    
    
         /**
     * Set liczbkursantow
     *
     * @paraminteger $liczbakursantow
     *
     * @return Kursy
     */
    public function setLiczbakursantow($liczbakursantow)
    {
        $this->liczbakursantow = $liczbakursantow;

        return $this;
    }

    /**
     * Get liczbakursantow
     *
     * @return integer
     */
    public function getLiczbakursantow()
    {
        return $this->liczbakursantow;
    }
    
    
   
}

