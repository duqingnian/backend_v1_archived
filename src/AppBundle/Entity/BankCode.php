<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_bank_code")
 */
class BankCode
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $country=""; //国家别名  比如巴西：brazil
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $bank_name=""; //通道银行名称 不做任何处理
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $const_name=""; //大写的银行名称 去掉() . - 空格、等特殊字符全部替换为下划线 

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $const_code = 0; //平台清洗后的银行代码,比如：001

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
     * Set country
     *
     * @param string $country
     *
     * @return BankCode
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set bankName
     *
     * @param string $bankName
     *
     * @return BankCode
     */
    public function setBankName($bankName)
    {
        $this->bank_name = $bankName;

        return $this;
    }

    /**
     * Get bankName
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bank_name;
    }

    /**
     * Set constName
     *
     * @param string $constName
     *
     * @return BankCode
     */
    public function setConstName($constName)
    {
        $this->const_name = $constName;

        return $this;
    }

    /**
     * Get constName
     *
     * @return string
     */
    public function getConstName()
    {
        return $this->const_name;
    }

    /**
     * Set constCode
     *
     * @param string $constCode
     *
     * @return BankCode
     */
    public function setConstCode($constCode)
    {
        $this->const_code = $constCode;

        return $this;
    }

    /**
     * Get constCode
     *
     * @return string
     */
    public function getConstCode()
    {
        return $this->const_code;
    }
}
