<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_merchant")
 */
class Merchant
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $uid = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $channel_id = 0;
    
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lxr_name = '';
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $lxr_phone = '';
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $lxr_address = '';
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $name = '';
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $appid = '';
	
	/**
     * @ORM\Column(type="string", length=200)
     */
    private $app_secret = '';
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $percent = '';
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $df_percent = '';

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
     * Set lxrName
     *
     * @param string $lxrName
     *
     * @return Merchant
     */
    public function setLxrName($lxrName)
    {
        $this->lxr_name = $lxrName;

        return $this;
    }

    /**
     * Get lxrName
     *
     * @return string
     */
    public function getLxrName()
    {
        return $this->lxr_name;
    }

    /**
     * Set lxrPhone
     *
     * @param string $lxrPhone
     *
     * @return Merchant
     */
    public function setLxrPhone($lxrPhone)
    {
        $this->lxr_phone = $lxrPhone;

        return $this;
    }

    /**
     * Get lxrPhone
     *
     * @return string
     */
    public function getLxrPhone()
    {
        return $this->lxr_phone;
    }

    /**
     * Set lxrAddress
     *
     * @param string $lxrAddress
     *
     * @return Merchant
     */
    public function setLxrAddress($lxrAddress)
    {
        $this->lxr_address = $lxrAddress;

        return $this;
    }

    /**
     * Get lxrAddress
     *
     * @return string
     */
    public function getLxrAddress()
    {
        return $this->lxr_address;
    }

    /**
     * Set uid
     *
     * @param integer $uid
     *
     * @return Merchant
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set appid
     *
     * @param string $appid
     *
     * @return Merchant
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;

        return $this;
    }

    /**
     * Get appid
     *
     * @return string
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * Set appSecret
     *
     * @param string $appSecret
     *
     * @return Merchant
     */
    public function setAppSecret($appSecret)
    {
        $this->app_secret = $appSecret;

        return $this;
    }

    /**
     * Get appSecret
     *
     * @return string
     */
    public function getAppSecret()
    {
        return $this->app_secret;
    }

    /**
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return Merchant
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
     * Set percent
     *
     * @param string $percent
     *
     * @return Merchant
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Get percent
     *
     * @return string
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Merchant
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
     * Set dfPercent
     *
     * @param string $dfPercent
     *
     * @return Merchant
     */
    public function setDfPercent($dfPercent)
    {
        $this->df_percent = $dfPercent;

        return $this;
    }

    /**
     * Get dfPercent
     *
     * @return string
     */
    public function getDfPercent()
    {
        return $this->df_percent;
    }
}
