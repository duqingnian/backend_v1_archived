<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_order_payout")
 */
class PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return PayoutOrder
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
