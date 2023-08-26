<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_channel")
 */
class Channel
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
    private $icon = ''; //图标
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $name = ''; //名称
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $slug = ''; //slug别名
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $percent = ''; //费率
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $df_percent = ''; //代付费率
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_active = 0; //是否启用
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $app_id = '';
	
	/**
     * @ORM\Column(type="string", length=200)
     */
    private $app_secret = '';
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $pay_type = ''; //付款类型 二维码\跳转
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $currency = ''; //货币

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $country = ''; //国家

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
     * Set icon
     *
     * @param string $icon
     *
     * @return Channel
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Channel
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
     * Set percent
     *
     * @param string $percent
     *
     * @return Channel
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
     * Set isActive
     *
     * @param integer $isActive
     *
     * @return Channel
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set appId
     *
     * @param string $appId
     *
     * @return Channel
     */
    public function setAppId($appId)
    {
        $this->app_id = $appId;

        return $this;
    }

    /**
     * Get appId
     *
     * @return string
     */
    public function getAppId()
    {
        return $this->app_id;
    }

    /**
     * Set appSecret
     *
     * @param string $appSecret
     *
     * @return Channel
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
     * Set payType
     *
     * @param string $payType
     *
     * @return Channel
     */
    public function setPayType($payType)
    {
        $this->pay_type = $payType;

        return $this;
    }

    /**
     * Get payType
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->pay_type;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Channel
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
     * @return Channel
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
     * Set country
     *
     * @param string $country
     *
     * @return Channel
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
     * Set dfPercent
     *
     * @param string $dfPercent
     *
     * @return Channel
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
