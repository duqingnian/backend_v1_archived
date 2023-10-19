<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_order_payin")
 */
class PayinOrder
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
    private $shanghu_id = 0; //商户ID
	
	/**
     * @ORM\Column(type="integer")
     */
    private $channel_id = 0;  //通道id
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $amount = 0.00;  //支付的费用
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $realpay_amount = 0.00;  //实际支付的费用
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $channel_order_no = ''; //通道订单号
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $shanghu_order_no = ''; //商户订单号
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $plantform_order_no = ''; //平台订单号
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $order_status = '';
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $sh_pct = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $sh_sigle_fee = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $sh_fee = 0.00;  //支付的费用
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $channel_pct = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $channel_sigle_fee = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $channel_fee = 0.00;  //支付的费用
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $order_type = ''; //HAND手动 NORMAL正常 MULTI_HAND手动批量
	
	/**
     * @ORM\Column(type="integer")
     */
    private $channel_plantform_notifed = 0; //通道 --> 平台 回调
	
	/**
     * @ORM\Column(type="integer")
     */
    private $plantform_shanghu_notifed = 0; //平台 --> 商户 回调
	
	/**
     * @ORM\Column(type="string", length=300)
     */
    private $shanghu_notify_url = ''; //商户的回调地址
	
	/**
     * @ORM\Column(type="string", length=300)
     */
    private $jump_url = ''; //跳转地址
	
	/**
     * @ORM\Column(type="string", length=500)
     */
    private $qrcode = ''; //二维码
	
	/**
     * @ORM\Column(type="string", length=300)
     */
    private $sh_jump_url = ''; //商户跳转地址
	
	/**
     * @ORM\Column(type="string", length=300)
     */
    private $qrcode_src = ''; //二维码
	
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
     * Set shanghuId
     *
     * @param integer $shanghuId
     *
     * @return PayinOrder
     */
    public function setShanghuId($shanghuId)
    {
        $this->shanghu_id = $shanghuId;

        return $this;
    }

    /**
     * Get shanghuId
     *
     * @return integer
     */
    public function getShanghuId()
    {
        return $this->shanghu_id;
    }

    /**
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return PayinOrder
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
     * @return PayinOrder
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
     * Set channelOrderNo
     *
     * @param string $channelOrderNo
     *
     * @return PayinOrder
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
     * Set shanghuOrderNo
     *
     * @param string $shanghuOrderNo
     *
     * @return PayinOrder
     */
    public function setShanghuOrderNo($shanghuOrderNo)
    {
        $this->shanghu_order_no = $shanghuOrderNo;

        return $this;
    }

    /**
     * Get shanghuOrderNo
     *
     * @return string
     */
    public function getShanghuOrderNo()
    {
        return $this->shanghu_order_no;
    }

    /**
     * Set plantformOrderNo
     *
     * @param string $plantformOrderNo
     *
     * @return PayinOrder
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
     * Set orderStatus
     *
     * @param string $orderStatus
     *
     * @return PayinOrder
     */
    public function setOrderStatus($orderStatus)
    {
        $this->order_status = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }

    /**
     * Set shPct
     *
     * @param string $shPct
     *
     * @return PayinOrder
     */
    public function setShPct($shPct)
    {
        $this->sh_pct = $shPct;

        return $this;
    }

    /**
     * Get shPct
     *
     * @return string
     */
    public function getShPct()
    {
        return $this->sh_pct;
    }

    /**
     * Set shSigleFee
     *
     * @param string $shSigleFee
     *
     * @return PayinOrder
     */
    public function setShSigleFee($shSigleFee)
    {
        $this->sh_sigle_fee = $shSigleFee;

        return $this;
    }

    /**
     * Get shSigleFee
     *
     * @return string
     */
    public function getShSigleFee()
    {
        return $this->sh_sigle_fee;
    }

    /**
     * Set shFee
     *
     * @param string $shFee
     *
     * @return PayinOrder
     */
    public function setShFee($shFee)
    {
        $this->sh_fee = $shFee;

        return $this;
    }

    /**
     * Get shFee
     *
     * @return string
     */
    public function getShFee()
    {
        return $this->sh_fee;
    }

    /**
     * Set channelPct
     *
     * @param string $channelPct
     *
     * @return PayinOrder
     */
    public function setChannelPct($channelPct)
    {
        $this->channel_pct = $channelPct;

        return $this;
    }

    /**
     * Get channelPct
     *
     * @return string
     */
    public function getChannelPct()
    {
        return $this->channel_pct;
    }

    /**
     * Set channelSigleFee
     *
     * @param string $channelSigleFee
     *
     * @return PayinOrder
     */
    public function setChannelSigleFee($channelSigleFee)
    {
        $this->channel_sigle_fee = $channelSigleFee;

        return $this;
    }

    /**
     * Get channelSigleFee
     *
     * @return string
     */
    public function getChannelSigleFee()
    {
        return $this->channel_sigle_fee;
    }

    /**
     * Set channelFee
     *
     * @param string $channelFee
     *
     * @return PayinOrder
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
     * Set orderType
     *
     * @param string $orderType
     *
     * @return PayinOrder
     */
    public function setOrderType($orderType)
    {
        $this->order_type = $orderType;

        return $this;
    }

    /**
     * Get orderType
     *
     * @return string
     */
    public function getOrderType()
    {
        return $this->order_type;
    }

    /**
     * Set channelPlantformNotifed
     *
     * @param integer $channelPlantformNotifed
     *
     * @return PayinOrder
     */
    public function setChannelPlantformNotifed($channelPlantformNotifed)
    {
        $this->channel_plantform_notifed = $channelPlantformNotifed;

        return $this;
    }

    /**
     * Get channelPlantformNotifed
     *
     * @return integer
     */
    public function getChannelPlantformNotifed()
    {
        return $this->channel_plantform_notifed;
    }

    /**
     * Set plantformShanghuNotifed
     *
     * @param integer $plantformShanghuNotifed
     *
     * @return PayinOrder
     */
    public function setPlantformShanghuNotifed($plantformShanghuNotifed)
    {
        $this->plantform_shanghu_notifed = $plantformShanghuNotifed;

        return $this;
    }

    /**
     * Get plantformShanghuNotifed
     *
     * @return integer
     */
    public function getPlantformShanghuNotifed()
    {
        return $this->plantform_shanghu_notifed;
    }

    /**
     * Set shanghuNotifyUrl
     *
     * @param string $shanghuNotifyUrl
     *
     * @return PayinOrder
     */
    public function setShanghuNotifyUrl($shanghuNotifyUrl)
    {
        $this->shanghu_notify_url = $shanghuNotifyUrl;

        return $this;
    }

    /**
     * Get shanghuNotifyUrl
     *
     * @return string
     */
    public function getShanghuNotifyUrl()
    {
        return $this->shanghu_notify_url;
    }

    /**
     * Set jumpUrl
     *
     * @param string $jumpUrl
     *
     * @return PayinOrder
     */
    public function setJumpUrl($jumpUrl)
    {
        $this->jump_url = $jumpUrl;

        return $this;
    }

    /**
     * Get jumpUrl
     *
     * @return string
     */
    public function getJumpUrl()
    {
        return $this->jump_url;
    }

    /**
     * Set qrcode
     *
     * @param string $qrcode
     *
     * @return PayinOrder
     */
    public function setQrcode($qrcode)
    {
        $this->qrcode = $qrcode;

        return $this;
    }

    /**
     * Get qrcode
     *
     * @return string
     */
    public function getQrcode()
    {
        return $this->qrcode;
    }

    /**
     * Set shJumpUrl
     *
     * @param string $shJumpUrl
     *
     * @return PayinOrder
     */
    public function setShJumpUrl($shJumpUrl)
    {
        $this->sh_jump_url = $shJumpUrl;

        return $this;
    }

    /**
     * Get shJumpUrl
     *
     * @return string
     */
    public function getShJumpUrl()
    {
        return $this->sh_jump_url;
    }

    /**
     * Set qrcodeSrc
     *
     * @param string $qrcodeSrc
     *
     * @return PayinOrder
     */
    public function setQrcodeSrc($qrcodeSrc)
    {
        $this->qrcode_src = $qrcodeSrc;

        return $this;
    }

    /**
     * Get qrcodeSrc
     *
     * @return string
     */
    public function getQrcodeSrc()
    {
        return $this->qrcode_src;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return PayinOrder
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
     * Set realpayAmount
     *
     * @param string $realpayAmount
     *
     * @return PayinOrder
     */
    public function setRealpayAmount($realpayAmount)
    {
        $this->realpay_amount = $realpayAmount;

        return $this;
    }

    /**
     * Get realpayAmount
     *
     * @return string
     */
    public function getRealpayAmount()
    {
        return $this->realpay_amount;
    }
}
