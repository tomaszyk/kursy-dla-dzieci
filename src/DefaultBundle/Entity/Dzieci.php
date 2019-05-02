<?php

namespace DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Dzieci
 *
 * @ORM\Table(name="dzieci")
 * @ORM\Entity(repositoryClass="DefaultBundle\Repository\DzieciRepository")
 */
class Dzieci
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
     * @ORM\Column(name="z24_id_sprzedawcy", type="string", length=255)
     * 
     */
    private $z24IdSprzedawcy;


    //  /**
    //  * @var string
    //  *
    //  * @ORM\Column(name="etykieta", type="string", length=255)
    //  *
    //  */
    // private $etykieta;

    /**
     * @var string
     *
     * @ORM\Column(name="z24_crc", type="string", length=255)
     */
    private $z24Crc;

    /**
     * @var string
     *
     * @ORM\Column(name="z24_return_url", type="string", length=255)
     */
    private $z24ReturnUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="z24_language", type="string", length=255)
     */
    private $z24Language;

    /**
     * @var string
     *
     * @ORM\Column(name="k24_nazwa", type="string", length=255)
     * @Assert\NotBlank(message = "To pole nie może być puste")
     * @Assert\Regex(
     *                  pattern = "/^[A-ZĄĘŚŻŹĆÓŁŃ][a-zA-ZĄĘŚĆŻŹÓŁŃąęśćżźółń(0-9)*]{2,}/",
     *                  message = "Imię musi zaczynać się wielką literą"
     *                  )
     *
     *
     *
     * @Assert\Regex(
     *                  pattern = "/[ ][A-ZĄĘŚŻŹĆÓŁŃ][a-zA-ZĄĘŚĆŻŹÓŁŃąęśćżźółń(0-9)*\-]{2,}$/",
     *                  message = "Nazwisko musi zaczynać się wielką literą"
     *                  )
     *
     * @Assert\Regex(
     *                  pattern="/\d/",
     *                  match=false,
     *                  message="To pole może zawierać cyfr"
     *                  )
     *
     *
     */

    private $k24_nazwa;


    /**
     * @var string
     *
     * @ORM\Column(name="k24_ulica", type="string", length=255)
     * @Assert\NotBlank(message = "To pole nie może być puste")
     * @Assert\Regex(
     *                  pattern = "/^[A-ZĄĘŚŻŹĆÓŁŃ][A-ZĄĘŚŻŹĆÓŁŃa-zA-ZĄĘŚĆŻŹÓŁŃąęśćżźółń\. ]+$/",
     *                  message = "Nazwa ulicy musi się zaczynać wielką literą")
     * 
     * @Assert\Regex(
     *                  pattern="/\d/",
     *                  match=false,
     *                  message="To pole może zawierać cyfr"
     *                  )
     */
    private $k24_ulica;

    /**
     * @var int
     *
     * @ORM\Column(name="k24_numer_dom", type="integer")
     * @Assert\NotBlank(message = "To pole nie może być puste")
     * @Assert\Regex(
     *                  pattern = "/^[0-9]+([A-ZĄĘŚŻŹĆÓŁŃa-z]{1})*$/",
     *                  message = "Numer domu musi zawierać tylko cyfry i pojedynczą wielką literę")
     */
    private $k24_numer_dom;

    /**
     * @var int
     *
     * @ORM\Column(name="k24_numer_lok", type="integer")
     * 
     * @Assert\Regex(
     *                  pattern = "/^[0-9]+([A-ZĄĘŚŻŹĆÓŁŃa-z]{1})*$/",
     *                  message = "Numer lokalu musi zawierać tylko cyfry i pojedynczą wielką literę")
     */
    private $k24_numer_lok;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=255)
     * @Assert\NotBlank(message = "To pole nie może być puste")
     * @Assert\Regex(
     *                  pattern = "/^[0-9]{3}[ -]*[0-9]{3}[ -]*[0-9]{3}$/",
     *                  message = "Niepoprawny format numeru telefonu")
     *
     */
    private $telefon;
    
    /**
     * @var string
     *
     * @ORM\Column(name="k24_kod", type="string", length=255)
     * @Assert\NotBlank(message = "To pole nie może być puste")
     * @Assert\Regex(
     *                  pattern = "/^[0-9]{2}[ ]*-[ ]*[0-9]{3}$/",
     *                  message = "Kod pocztowy musi zawierać same cyfry w następującym formacie XX-XXX"
     *                  )
     */
    private $k24_kod;
    
    /**
     * @var string
     *
     * @ORM\Column(name="k24_miasto", type="string", length=255)
     * @Assert\NotBlank(message = "To pole nie może być puste")
     * @Assert\Regex(
     *                  pattern = "/[A-ZŚŻŹŁ][a-zA_ZĄĘŚĆŻŹÓŁŃąęśćżźółń\- ]+/",
     *                  message = "Nazwa miasta musi się zaczynać wielką literą")
     *
     *
     *
     */
    private $k24_miasto;

    /**
     * @var string
     *
     * @ORM\Column(name="k24_email", type="string", length=255)
     * @Assert\Email(message = "Niepoprawny adres email")
     * @Assert\NotBlank(message = "To pole nie może być puste")
     */
    private $k24_email;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwaDz", type="string", length=255)
      * @Assert\NotBlank(message = "To pole nie może być puste")
     *  @Assert\Regex(
     *                  pattern = "/^[A-ZĄĘŚŻŹĆÓŁŃ][a-zA-ZĄĘŚĆŻŹÓŁŃąęśćżźółń(0-9)*]{2,}/",
     *                  message = "Imię musi zaczynać się wielką literą"
     *                  )
     *
     * @Assert\Regex(
     *                  pattern = "/[ ][A-ZĄĘŚŻŹĆÓŁŃ][a-zA-ZĄĘŚĆŻŹÓŁŃąęśćżźółń(0-9)*]{2,}$/",
     *                  message = "Nazwisko musi zaczynać się wielką literą"
     *                  )
     *
     * @Assert\Regex(
     *                  pattern="/\d/",
     *                  match=false,
     *                  message="To pole może zawierać cyfr"
     *                  )
     */

    private $nazwaDz;

    /**
     * @var int
     *
     * @ORM\Column(name="klasa", type="integer")
     * @Assert\NotBlank(message = "Uzupełnij klasę")
     */
    private $klasa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DataUr", type="date")
     * @Assert\NotBlank(message = "Uzupełnij datę urodzenia")
     */
    private $dataUr;

    /**
     * @var string
     *
     * @ORM\Column(name="grupa", type="string", length=255)
     * @Assert\NotBlank(message = "Uzupełnij grupę")
     */
    private $grupa;
    
   /**
     * @var bool
     *
     * @ORM\Column(name="polityka", type="boolean")
     * @Assert\NotBlank(message = "Zaznacz, że zapoznałeś się z polityką prywatności")
     */
    private $polityka;
    
    /**
     * @var string
     *
     * @ORM\Column(name="uwagi", type="text")
     */
    private $uwagi;
    
    


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
     * Set z24IdSprzedawcy
     *
     * @param string $z24IdSprzedawcy
     *
     * @return Zapis
     */
    public function setZ24IdSprzedawcy($z24IdSprzedawcy)
    {
        $this->z24IdSprzedawcy = $z24IdSprzedawcy;

        return $this;
    }

    /**
     * Get z24IdSprzedawcy
     *
     * @return string
     */
    public function getZ24IdSprzedawcy()
    {
        return $this->z24IdSprzedawcy;
    }

    /**
     * Set z24Crc
     *
     * @param string $z24Crc
     *
     * @return Zapis
     */
    public function setZ24Crc($z24Crc)
    {
        $this->z24Crc = $z24Crc;

        return $this;
    }

    /**
     * Get z24Crc
     *
     * @return string
     */
    public function getZ24Crc()
    {
        return $this->z24Crc;
    }

    /**
     * Set z24ReturnUrl
     *
     * @param string $z24ReturnUrl
     *
     * @return Zapis
     */
    public function setZ24ReturnUrl($z24ReturnUrl)
    {
        $this->z24ReturnUrl = $z24ReturnUrl;

        return $this;
    }

    /**
     * Get z24ReturnUrl
     *
     * @return string
     */
    public function getZ24ReturnUrl()
    {
        return $this->z24ReturnUrl;
    }

    /**
     * Set z24Language
     *
     * @param string $z24Language
     *
     * @return Zapis
     */
    public function setZ24Language($z24Language)
    {
        $this->z24Language = $z24Language;

        return $this;
    }

    /**
     * Get z24Language
     *
     * @return string
     */
    public function getZ24Language()
    {
        return $this->z24Language;
    }

    /**
     * Set k24_nazwa
     *
     * @param string $k24_nazwa
     *
     * @return Dzieci
     */
    public function setK24nazwa($k24_nazwa)
    {
        $this->k24_nazwa = $k24_nazwa;

        return $this;
    }

    /**
     * Get k24_nazwa
     *
     * @return string
     */
    public function getK24Nazwa()
    {
        return $this->k24_nazwa;
    }

    /**
     * Set k24_ulica
     *
     * @param string $k24_ulica
     *
     * @return Dzieci
     */
    public function setK24ulica($k24_ulica)
    {
        $this->k24_ulica = $k24_ulica;

        return $this;
    }

    /**
     * Get k24_ulica
     *
     * @return string
     */
    public function getK24ulica()
    {
        return $this->k24_ulica;
    }

    /**
     * Set k24_numer_dom
     *
     * @param integer $k24_numer_dom
     *
     * @return Dzieci
     */
    public function setK24numerdom($k24_numer_dom)
    {
        $this->k24_numer_dom = $k24_numer_dom;

        return $this;
    }

    /**
     * Get k24_numer_dom
     *
     * @return int
     */
    public function getK24numerdom()
    {
        return $this->k24_numer_dom;
    }

    /**
     * Set k24_numer_lok
     *
     * @param integer $k24_numer_lok
     *
     * @return Dzieci
     */
    public function setK24numerlok($k24_numer_lok)
    {
        $this->k24_numer_lok = $k24_numer_lok;

        return $this;
    }

    /**
     * Get k24_numer_lok
     *
     * @return int
     */
    public function getK24numerlok()
    {
        return $this->k24_numer_lok;
    }
    
     /**
     * Set k24_kod
     *
     * @param string $k24_kod
     *
     * @return Dzieci
     */
    public function setK24kod($k24_kod)
    {
        $this->k24_kod = $k24_kod;

        return $this;
    }

    /**
     * Get k24_kod
     *
     * @return string
     */
    public function getK24kod()
    {
        return $this->k24_kod;
    }
    
     /**
     * Set k24_miasto
     *
     * @param integer $k24_miasto
     *
     * @return Dzieci
     */
    public function setK24miasto($k24_miasto)
    {
        $this->k24_miasto = $k24_miasto;

        return $this;
    }

    /**
     * Get k24_miasto
     *
     * @return string
     */
    public function getk24miasto()
    {
        return $this->k24_miasto;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     *
     * @return Dzieci
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set k24_email
     *
     * @param string $k24_email
     *
     * @return Dzieci
     */
    public function setk24email($k24_email)
    {
        $this->k24_email = $k24_email;

        return $this;
    }

    /**
     * Get k24_email
     *
     * @return string
     */
    public function getk24email()
    {
        return $this->k24_email;
    }

    /**
     * Set nazwaDz
     *
     * @param string $nazwaDz
     *
     * @return Dzieci
     */
    public function setNazwaDz($nazwaDz)
    {
        $this->nazwaDz = $nazwaDz;

        return $this;
    }

    /**
     * Get nazwaDz
     *
     * @return string
     */
    public function getNazwaDz()
    {
        return $this->nazwaDz;
    }

    /**
     * Set klasa
     *
     * @param integer $klasa
     *
     * @return Dzieci
     */
    public function setKlasa($klasa)
    {
        $this->klasa = $klasa;

        return $this;
    }

    /**
     * Get klasa
     *
     * @return int
     */
    public function getKlasa()
    {
        return $this->klasa;
    }

    /**
     * Set dataUr
     *
     * @param \DateTime $dataUr
     *
     * @return Dzieci
     */
    public function setDataUr($dataUr)
    {
        $this->dataUr = $dataUr;

        return $this;
    }

    /**
     * Get dataUr
     *
     * @return \DateTime
     */
    public function getDataUr()
    {
        return $this->dataUr;
    }

    /**
     * Set grupa
     *
     * @param string $grupa
     *
     * @return Dzieci
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
     * Set polityka
     *
     * @param boolean $polityka
     *
     * @return polit
     */
    public function setPolityka($polityka)
    {
        $this->polityka = $polityka;

        return $this;
    }

    /**
     * Get polityka
     *
     * @return bool
     */
    public function getPolityka()
    {
        return $this->polityka;
    }
    
     /**
     * Set uwagi
     *
     * @param string $uwagi
     *
     * @return uwagi
     */
    public function setUwagi($uwagi)
    {
        $this->uwagi = $uwagi;

        return $this;
    }

    /**
     * Get uwagi
     *
     * @return string
     */
    public function getUwagi()
    {
        return $this->uwagi;
    }
    
    
}

