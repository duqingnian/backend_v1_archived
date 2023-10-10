<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_country")
 */
class Country
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $code="";
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $name=""; //巴西
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $slug=""; //brazil
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $currency=""; //BRL
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $currency_name="";

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
     *
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Country
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Country
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set currencyName
     *
     * @param string $currencyName
     *
     * @return Country
     */
    public function setCurrencyName($currencyName)
    {
        $this->currency_name = $currencyName;

        return $this;
    }

    /**
     * Get currencyName
     *
     * @return string
     */
    public function getCurrencyName()
    {
        return $this->currency_name;
    }
}
