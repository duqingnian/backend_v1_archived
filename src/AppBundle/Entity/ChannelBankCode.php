<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_channel_bank_code")
 */
class ChannelBankCode
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
    private $country=""; //国家别名
	
	/**
     * @ORM\Column(type="integer")
     */
    private $channel_id = 0; //通道id

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $original_name=""; //通道的国家别名
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $original_code = ""; //通道的银行代码
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $const_code = ""; //平台清洗后的银行代码
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $const_name="";

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
     * @return ChannelBankCode
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
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return ChannelBankCode
     */
    public function setChannelId($channelId)
    {
        $this->channel_id = $channelId;

        return $this;
    }

    /**
     * Get channelId
     *
     * @return integer
     */
    public function getChannelId()
    {
        return $this->channel_id;
    }

    /**
     * Set originalName
     *
     * @param string $originalName
     *
     * @return ChannelBankCode
     */
    public function setOriginalName($originalName)
    {
        $this->original_name = $originalName;

        return $this;
    }

    /**
     * Get originalName
     *
     * @return string
     */
    public function getOriginalName()
    {
        return $this->original_name;
    }

    /**
     * Set originalCode
     *
     * @param string $originalCode
     *
     * @return ChannelBankCode
     */
    public function setOriginalCode($originalCode)
    {
        $this->original_code = $originalCode;

        return $this;
    }

    /**
     * Get originalCode
     *
     * @return string
     */
    public function getOriginalCode()
    {
        return $this->original_code;
    }

    /**
     * Set constCode
     *
     * @param string $constCode
     *
     * @return ChannelBankCode
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

    /**
     * Set constName
     *
     * @param string $constName
     *
     * @return ChannelBankCode
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
}
