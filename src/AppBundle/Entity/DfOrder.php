<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_df_order")
 */
class DfOrder
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
    private $merchant_id = 0; //商户ID
	
	/**
     * @ORM\Column(type="integer")
     */
    private $channel_id = 0;  //通道id
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $amount = '';  //支付的费用
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $bankname = '';  //银行名称
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $bank_card_no = '';  //银行卡号
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $channel_order_no = ''; //通道订单号
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $merchant_order_no = ''; //商户订单号
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $plantform_order_no = ''; //平台订单号
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $channel_percent = '';  //通道百分比
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $merchant_percent = ''; //商户百分百
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $proxy_percent = ''; //代理百分百
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $channel_fee = '';
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $merchant_fee = '';
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $proxy_fee = '';
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $currency = '';  //货币
	
	/**
     * @ORM\Column(type="string", length=200)
     */
    private $merchant_notify_url = '';  //回调地址
	
	/**
     * @ORM\Column(type="string", length=200)
     */
    private $plantform_notify_url = '';  //回调地址
	
	/**
     * @ORM\Column(type="integer")
     */
    private $channel_api_code = 0;  // api code
	
	/**
     * @ORM\Column(type="text")
     */
    private $channel_api_result = '';
	
	/**
     * @ORM\Column(type="string", length=2)
     */
    private $plantform_notify_hooked = 'N';

	/**
     * @ORM\Column(type="string", length=2)
     */
    private $merchant_notify_hooked = 'N';
	
	/**
     * @ORM\Column(type="text")
     */
    private $channel_notify_data = '';
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $merchant_notify_result = '';

	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0; //创建时间


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
     * Set merchantId
     *
     * @param integer $merchantId
     *
     * @return DfOrder
     */
    public function setMerchantId($merchantId)
    {
        $this->merchant_id = $merchantId;

        return $this;
    }

    /**
     * Get merchantId
     *
     * @return integer
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
    }

    /**
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return DfOrder
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
     * Set amount
     *
     * @param string $amount
     *
     * @return DfOrder
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set bankname
     *
     * @param string $bankname
     *
     * @return DfOrder
     */
    public function setBankname($bankname)
    {
        $this->bankname = $bankname;

        return $this;
    }

    /**
     * Get bankname
     *
     * @return string
     */
    public function getBankname()
    {
        return $this->bankname;
    }

    /**
     * Set bankCardNo
     *
     * @param string $bankCardNo
     *
     * @return DfOrder
     */
    public function setBankCardNo($bankCardNo)
    {
        $this->bank_card_no = $bankCardNo;

        return $this;
    }

    /**
     * Get bankCardNo
     *
     * @return string
     */
    public function getBankCardNo()
    {
        return $this->bank_card_no;
    }

    /**
     * Set channelOrderNo
     *
     * @param string $channelOrderNo
     *
     * @return DfOrder
     */
    public function setChannelOrderNo($channelOrderNo)
    {
        $this->channel_order_no = $channelOrderNo;

        return $this;
    }

    /**
     * Get channelOrderNo
     *
     * @return string
     */
    public function getChannelOrderNo()
    {
        return $this->channel_order_no;
    }

    /**
     * Set merchantOrderNo
     *
     * @param string $merchantOrderNo
     *
     * @return DfOrder
     */
    public function setMerchantOrderNo($merchantOrderNo)
    {
        $this->merchant_order_no = $merchantOrderNo;

        return $this;
    }

    /**
     * Get merchantOrderNo
     *
     * @return string
     */
    public function getMerchantOrderNo()
    {
        return $this->merchant_order_no;
    }

    /**
     * Set plantformOrderNo
     *
     * @param string $plantformOrderNo
     *
     * @return DfOrder
     */
    public function setPlantformOrderNo($plantformOrderNo)
    {
        $this->plantform_order_no = $plantformOrderNo;

        return $this;
    }

    /**
     * Get plantformOrderNo
     *
     * @return string
     */
    public function getPlantformOrderNo()
    {
        return $this->plantform_order_no;
    }

    /**
     * Set channelPercent
     *
     * @param string $channelPercent
     *
     * @return DfOrder
     */
    public function setChannelPercent($channelPercent)
    {
        $this->channel_percent = $channelPercent;

        return $this;
    }

    /**
     * Get channelPercent
     *
     * @return string
     */
    public function getChannelPercent()
    {
        return $this->channel_percent;
    }

    /**
     * Set merchantPercent
     *
     * @param string $merchantPercent
     *
     * @return DfOrder
     */
    public function setMerchantPercent($merchantPercent)
    {
        $this->merchant_percent = $merchantPercent;

        return $this;
    }

    /**
     * Get merchantPercent
     *
     * @return string
     */
    public function getMerchantPercent()
    {
        return $this->merchant_percent;
    }

    /**
     * Set proxyPercent
     *
     * @param string $proxyPercent
     *
     * @return DfOrder
     */
    public function setProxyPercent($proxyPercent)
    {
        $this->proxy_percent = $proxyPercent;

        return $this;
    }

    /**
     * Get proxyPercent
     *
     * @return string
     */
    public function getProxyPercent()
    {
        return $this->proxy_percent;
    }

    /**
     * Set channelFee
     *
     * @param string $channelFee
     *
     * @return DfOrder
     */
    public function setChannelFee($channelFee)
    {
        $this->channel_fee = $channelFee;

        return $this;
    }

    /**
     * Get channelFee
     *
     * @return string
     */
    public function getChannelFee()
    {
        return $this->channel_fee;
    }

    /**
     * Set merchantFee
     *
     * @param string $merchantFee
     *
     * @return DfOrder
     */
    public function setMerchantFee($merchantFee)
    {
        $this->merchant_fee = $merchantFee;

        return $this;
    }

    /**
     * Get merchantFee
     *
     * @return string
     */
    public function getMerchantFee()
    {
        return $this->merchant_fee;
    }

    /**
     * Set proxyFee
     *
     * @param string $proxyFee
     *
     * @return DfOrder
     */
    public function setProxyFee($proxyFee)
    {
        $this->proxy_fee = $proxyFee;

        return $this;
    }

    /**
     * Get proxyFee
     *
     * @return string
     */
    public function getProxyFee()
    {
        return $this->proxy_fee;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return DfOrder
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
     * Set merchantNotifyUrl
     *
     * @param string $merchantNotifyUrl
     *
     * @return DfOrder
     */
    public function setMerchantNotifyUrl($merchantNotifyUrl)
    {
        $this->merchant_notify_url = $merchantNotifyUrl;

        return $this;
    }

    /**
     * Get merchantNotifyUrl
     *
     * @return string
     */
    public function getMerchantNotifyUrl()
    {
        return $this->merchant_notify_url;
    }

    /**
     * Set plantformNotifyUrl
     *
     * @param string $plantformNotifyUrl
     *
     * @return DfOrder
     */
    public function setPlantformNotifyUrl($plantformNotifyUrl)
    {
        $this->plantform_notify_url = $plantformNotifyUrl;

        return $this;
    }

    /**
     * Get plantformNotifyUrl
     *
     * @return string
     */
    public function getPlantformNotifyUrl()
    {
        return $this->plantform_notify_url;
    }

    /**
     * Set channelApiCode
     *
     * @param integer $channelApiCode
     *
     * @return DfOrder
     */
    public function setChannelApiCode($channelApiCode)
    {
        $this->channel_api_code = $channelApiCode;

        return $this;
    }

    /**
     * Get channelApiCode
     *
     * @return integer
     */
    public function getChannelApiCode()
    {
        return $this->channel_api_code;
    }

    /**
     * Set channelApiResult
     *
     * @param string $channelApiResult
     *
     * @return DfOrder
     */
    public function setChannelApiResult($channelApiResult)
    {
        $this->channel_api_result = $channelApiResult;

        return $this;
    }

    /**
     * Get channelApiResult
     *
     * @return string
     */
    public function getChannelApiResult()
    {
        return $this->channel_api_result;
    }

    /**
     * Set plantformNotifyHooked
     *
     * @param string $plantformNotifyHooked
     *
     * @return DfOrder
     */
    public function setPlantformNotifyHooked($plantformNotifyHooked)
    {
        $this->plantform_notify_hooked = $plantformNotifyHooked;

        return $this;
    }

    /**
     * Get plantformNotifyHooked
     *
     * @return string
     */
    public function getPlantformNotifyHooked()
    {
        return $this->plantform_notify_hooked;
    }

    /**
     * Set merchantNotifyHooked
     *
     * @param string $merchantNotifyHooked
     *
     * @return DfOrder
     */
    public function setMerchantNotifyHooked($merchantNotifyHooked)
    {
        $this->merchant_notify_hooked = $merchantNotifyHooked;

        return $this;
    }

    /**
     * Get merchantNotifyHooked
     *
     * @return string
     */
    public function getMerchantNotifyHooked()
    {
        return $this->merchant_notify_hooked;
    }

    /**
     * Set channelNotifyData
     *
     * @param string $channelNotifyData
     *
     * @return DfOrder
     */
    public function setChannelNotifyData($channelNotifyData)
    {
        $this->channel_notify_data = $channelNotifyData;

        return $this;
    }

    /**
     * Get channelNotifyData
     *
     * @return string
     */
    public function getChannelNotifyData()
    {
        return $this->channel_notify_data;
    }

    /**
     * Set merchantNotifyResult
     *
     * @param string $merchantNotifyResult
     *
     * @return DfOrder
     */
    public function setMerchantNotifyResult($merchantNotifyResult)
    {
        $this->merchant_notify_result = $merchantNotifyResult;

        return $this;
    }

    /**
     * Get merchantNotifyResult
     *
     * @return string
     */
    public function getMerchantNotifyResult()
    {
        return $this->merchant_notify_result;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return DfOrder
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
}
