<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_shanghu_config")
 */
class ShanghuConfig
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
    private $master_id = 0;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $payin_appid = "";
	
	/**
     * @ORM\Column(type="string", length=64)
     */
    private $payin_secret = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payin_channel_id = 0;
	
	/**
     * @ORM\Column(type="string", length=32)
     */
    private $payout_appid = "";
	
	/**
     * @ORM\Column(type="string", length=64)
     */
    private $payout_secret = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payout_channel_id = 0;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $payin_pct = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $payin_sigle_fee = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $payout_pct = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $payout_sigle_fee = 0.00;
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $payin_sign_method = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $payout_sign_method = "";

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ip_whitelist = "";
	
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
     * Set masterId
     *
     * @param integer $masterId
     *
     * @return ShanghuConfig
     */
    public function setMasterId($masterId)
    {
        $this->master_id = $masterId;

        return $this;
    }

    /**
     * Get masterId
     *
     * @return integer
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Set payinAppid
     *
     * @param string $payinAppid
     *
     * @return ShanghuConfig
     */
    public function setPayinAppid($payinAppid)
    {
        $this->payin_appid = $payinAppid;

        return $this;
    }

    /**
     * Get payinAppid
     *
     * @return string
     */
    public function getPayinAppid()
    {
        return $this->payin_appid;
    }

    /**
     * Set payinSecret
     *
     * @param string $payinSecret
     *
     * @return ShanghuConfig
     */
    public function setPayinSecret($payinSecret)
    {
        $this->payin_secret = $payinSecret;

        return $this;
    }

    /**
     * Get payinSecret
     *
     * @return string
     */
    public function getPayinSecret()
    {
        return $this->payin_secret;
    }

    /**
     * Set payoutAppid
     *
     * @param string $payoutAppid
     *
     * @return ShanghuConfig
     */
    public function setPayoutAppid($payoutAppid)
    {
        $this->payout_appid = $payoutAppid;

        return $this;
    }

    /**
     * Get payoutAppid
     *
     * @return string
     */
    public function getPayoutAppid()
    {
        return $this->payout_appid;
    }

    /**
     * Set payoutSecret
     *
     * @param string $payoutSecret
     *
     * @return ShanghuConfig
     */
    public function setPayoutSecret($payoutSecret)
    {
        $this->payout_secret = $payoutSecret;

        return $this;
    }

    /**
     * Get payoutSecret
     *
     * @return string
     */
    public function getPayoutSecret()
    {
        return $this->payout_secret;
    }

    /**
     * Set payinChannelId
     *
     * @param integer $payinChannelId
     *
     * @return ShanghuConfig
     */
    public function setPayinChannelId($payinChannelId)
    {
        $this->payin_channel_id = $payinChannelId;

        return $this;
    }

    /**
     * Get payinChannelId
     *
     * @return integer
     */
    public function getPayinChannelId()
    {
        return $this->payin_channel_id;
    }

    /**
     * Set payinPct
     *
     * @param integer $payinPct
     *
     * @return ShanghuConfig
     */
    public function setPayinPct($payinPct)
    {
        $this->payin_pct = $payinPct;

        return $this;
    }

    /**
     * Get payinPct
     *
     * @return integer
     */
    public function getPayinPct()
    {
        return $this->payin_pct;
    }

    /**
     * Set payinSigleFee
     *
     * @param integer $payinSigleFee
     *
     * @return ShanghuConfig
     */
    public function setPayinSigleFee($payinSigleFee)
    {
        $this->payin_sigle_fee = $payinSigleFee;

        return $this;
    }

    /**
     * Get payinSigleFee
     *
     * @return integer
     */
    public function getPayinSigleFee()
    {
        return $this->payin_sigle_fee;
    }

    /**
     * Set payoutChannelId
     *
     * @param integer $payoutChannelId
     *
     * @return ShanghuConfig
     */
    public function setPayoutChannelId($payoutChannelId)
    {
        $this->payout_channel_id = $payoutChannelId;

        return $this;
    }

    /**
     * Get payoutChannelId
     *
     * @return integer
     */
    public function getPayoutChannelId()
    {
        return $this->payout_channel_id;
    }

    /**
     * Set payoutPct
     *
     * @param integer $payoutPct
     *
     * @return ShanghuConfig
     */
    public function setPayoutPct($payoutPct)
    {
        $this->payout_pct = $payoutPct;

        return $this;
    }

    /**
     * Get payoutPct
     *
     * @return integer
     */
    public function getPayoutPct()
    {
        return $this->payout_pct;
    }

    /**
     * Set payoutSigleFee
     *
     * @param integer $payoutSigleFee
     *
     * @return ShanghuConfig
     */
    public function setPayoutSigleFee($payoutSigleFee)
    {
        $this->payout_sigle_fee = $payoutSigleFee;

        return $this;
    }

    /**
     * Get payoutSigleFee
     *
     * @return integer
     */
    public function getPayoutSigleFee()
    {
        return $this->payout_sigle_fee;
    }

    /**
     * Set payinSignMethod
     *
     * @param string $payinSignMethod
     *
     * @return ShanghuConfig
     */
    public function setPayinSignMethod($payinSignMethod)
    {
        $this->payin_sign_method = $payinSignMethod;

        return $this;
    }

    /**
     * Get payinSignMethod
     *
     * @return string
     */
    public function getPayinSignMethod()
    {
        return $this->payin_sign_method;
    }

    /**
     * Set payoutSignMethod
     *
     * @param string $payoutSignMethod
     *
     * @return ShanghuConfig
     */
    public function setPayoutSignMethod($payoutSignMethod)
    {
        $this->payout_sign_method = $payoutSignMethod;

        return $this;
    }

    /**
     * Get payoutSignMethod
     *
     * @return string
     */
    public function getPayoutSignMethod()
    {
        return $this->payout_sign_method;
    }

    /**
     * Set ipWhitelist
     *
     * @param string $ipWhitelist
     *
     * @return ShanghuConfig
     */
    public function setIpWhitelist($ipWhitelist)
    {
        $this->ip_whitelist = $ipWhitelist;

        return $this;
    }

    /**
     * Get ipWhitelist
     *
     * @return string
     */
    public function getIpWhitelist()
    {
        return $this->ip_whitelist;
    }
}
