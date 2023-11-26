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
     * @ORM\Column(type="integer")
     */
    private $category = 0;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name; //名称
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $display_name; //给商户看的名称，便于查询银行代码
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $balance = 0.00; //余额
	
	/**
     * @ORM\Column(type="integer")
     */
    private $balance_last_update_at = 0;
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $slug=""; //通道别名
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $telegram_group_id ="";
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $timezone=""; //时区
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $country=""; //国家
	
	/**
     * @ORM\Column(type="string", length=32)
     */
    private $merchant_id = "";
	
	/**
     * @ORM\Column(type="string", length=32)
     */
    private $payin_appid = "";
	
	/**
     * @ORM\Column(type="text")
     */
    private $payin_secret = "";
	
	/**
     * @ORM\Column(type="string", length=32)
     */
    private $payout_appid = "";
	
	/**
     * @ORM\Column(type="text")
     */
    private $payout_secret = "";
	
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
    private $payin_sign_method = "md5";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $payout_sign_method = "md5";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $payin_sign_col_name = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $payout_sign_col_name = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_active = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payout_check_bankcode = 0;
	
	/**
     * @ORM\Column(type="text")
     */
    private $note = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payin_min = 1;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payin_max = 9999999; //1000万
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payout_min = 10;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payout_max = 9999; //9999
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $payin_succ_str = "success";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $payout_succ_str = "success";

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ip_whitelist = "";
	
	/**
     * @ORM\Column(type="string", length=5)
     */
    private $amount_unit="Y";
	
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
     * Set telegramGroupId
     *
     * @param string $telegramGroupId
     *
     * @return Channel
     */
    public function setTelegramGroupId($telegramGroupId)
    {
        $this->telegram_group_id = $telegramGroupId;

        return $this;
    }

    /**
     * Get telegramGroupId
     *
     * @return string
     */
    public function getTelegramGroupId()
    {
        return $this->telegram_group_id;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     *
     * @return Channel
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
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
     * Set merchantId
     *
     * @param string $merchantId
     *
     * @return Channel
     */
    public function setMerchantId($merchantId)
    {
        $this->merchant_id = $merchantId;

        return $this;
    }

    /**
     * Get merchantId
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
    }

    /**
     * Set payinAppid
     *
     * @param string $payinAppid
     *
     * @return Channel
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
     * @return Channel
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
     * @return Channel
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
     * @return Channel
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
     * Set payinPct
     *
     * @param string $payinPct
     *
     * @return Channel
     */
    public function setPayinPct($payinPct)
    {
        $this->payin_pct = $payinPct;

        return $this;
    }

    /**
     * Get payinPct
     *
     * @return string
     */
    public function getPayinPct()
    {
        return $this->payin_pct;
    }

    /**
     * Set payinSigleFee
     *
     * @param string $payinSigleFee
     *
     * @return Channel
     */
    public function setPayinSigleFee($payinSigleFee)
    {
        $this->payin_sigle_fee = $payinSigleFee;

        return $this;
    }

    /**
     * Get payinSigleFee
     *
     * @return string
     */
    public function getPayinSigleFee()
    {
        return $this->payin_sigle_fee;
    }

    /**
     * Set payoutPct
     *
     * @param string $payoutPct
     *
     * @return Channel
     */
    public function setPayoutPct($payoutPct)
    {
        $this->payout_pct = $payoutPct;

        return $this;
    }

    /**
     * Get payoutPct
     *
     * @return string
     */
    public function getPayoutPct()
    {
        return $this->payout_pct;
    }

    /**
     * Set payoutSigleFee
     *
     * @param string $payoutSigleFee
     *
     * @return Channel
     */
    public function setPayoutSigleFee($payoutSigleFee)
    {
        $this->payout_sigle_fee = $payoutSigleFee;

        return $this;
    }

    /**
     * Get payoutSigleFee
     *
     * @return string
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
     * @return Channel
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
     * @return Channel
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
     * Set payinSignColName
     *
     * @param string $payinSignColName
     *
     * @return Channel
     */
    public function setPayinSignColName($payinSignColName)
    {
        $this->payin_sign_col_name = $payinSignColName;

        return $this;
    }

    /**
     * Get payinSignColName
     *
     * @return string
     */
    public function getPayinSignColName()
    {
        return $this->payin_sign_col_name;
    }

    /**
     * Set payoutSignColName
     *
     * @param string $payoutSignColName
     *
     * @return Channel
     */
    public function setPayoutSignColName($payoutSignColName)
    {
        $this->payout_sign_col_name = $payoutSignColName;

        return $this;
    }

    /**
     * Get payoutSignColName
     *
     * @return string
     */
    public function getPayoutSignColName()
    {
        return $this->payout_sign_col_name;
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
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return Channel
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return integer
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Channel
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set payinMin
     *
     * @param integer $payinMin
     *
     * @return Channel
     */
    public function setPayinMin($payinMin)
    {
        $this->payin_min = $payinMin;

        return $this;
    }

    /**
     * Get payinMin
     *
     * @return integer
     */
    public function getPayinMin()
    {
        return $this->payin_min;
    }

    /**
     * Set payinMax
     *
     * @param integer $payinMax
     *
     * @return Channel
     */
    public function setPayinMax($payinMax)
    {
        $this->payin_max = $payinMax;

        return $this;
    }

    /**
     * Get payinMax
     *
     * @return integer
     */
    public function getPayinMax()
    {
        return $this->payin_max;
    }

    /**
     * Set payoutMin
     *
     * @param integer $payoutMin
     *
     * @return Channel
     */
    public function setPayoutMin($payoutMin)
    {
        $this->payout_min = $payoutMin;

        return $this;
    }

    /**
     * Get payoutMin
     *
     * @return integer
     */
    public function getPayoutMin()
    {
        return $this->payout_min;
    }

    /**
     * Set payoutMax
     *
     * @param integer $payoutMax
     *
     * @return Channel
     */
    public function setPayoutMax($payoutMax)
    {
        $this->payout_max = $payoutMax;

        return $this;
    }

    /**
     * Get payoutMax
     *
     * @return integer
     */
    public function getPayoutMax()
    {
        return $this->payout_max;
    }

    /**
     * Set category
     *
     * @param integer $category
     *
     * @return Channel
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set balance
     *
     * @param string $balance
     *
     * @return Channel
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set balanceLastUpdateAt
     *
     * @param integer $balanceLastUpdateAt
     *
     * @return Channel
     */
    public function setBalanceLastUpdateAt($balanceLastUpdateAt)
    {
        $this->balance_last_update_at = $balanceLastUpdateAt;

        return $this;
    }

    /**
     * Get balanceLastUpdateAt
     *
     * @return integer
     */
    public function getBalanceLastUpdateAt()
    {
        return $this->balance_last_update_at;
    }

    /**
     * Set payoutCheckBankcode
     *
     * @param integer $payoutCheckBankcode
     *
     * @return Channel
     */
    public function setPayoutCheckBankcode($payoutCheckBankcode)
    {
        $this->payout_check_bankcode = $payoutCheckBankcode;

        return $this;
    }

    /**
     * Get payoutCheckBankcode
     *
     * @return integer
     */
    public function getPayoutCheckBankcode()
    {
        return $this->payout_check_bankcode;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return Channel
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set payinSuccStr
     *
     * @param string $payinSuccStr
     *
     * @return Channel
     */
    public function setPayinSuccStr($payinSuccStr)
    {
        $this->payin_succ_str = $payinSuccStr;

        return $this;
    }

    /**
     * Get payinSuccStr
     *
     * @return string
     */
    public function getPayinSuccStr()
    {
        return $this->payin_succ_str;
    }

    /**
     * Set payoutSuccStr
     *
     * @param string $payoutSuccStr
     *
     * @return Channel
     */
    public function setPayoutSuccStr($payoutSuccStr)
    {
        $this->payout_succ_str = $payoutSuccStr;

        return $this;
    }

    /**
     * Get payoutSuccStr
     *
     * @return string
     */
    public function getPayoutSuccStr()
    {
        return $this->payout_succ_str;
    }

    /**
     * Set ipWhitelist
     *
     * @param string $ipWhitelist
     *
     * @return Channel
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

    /**
     * Set amountUnit
     *
     * @param string $amountUnit
     *
     * @return Channel
     */
    public function setAmountUnit($amountUnit)
    {
        $this->amount_unit = $amountUnit;

        return $this;
    }

    /**
     * Get amountUnit
     *
     * @return string
     */
    public function getAmountUnit()
    {
        return $this->amount_unit;
    }
}
