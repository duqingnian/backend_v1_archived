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
    private $payout_pct = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $payout_sigle_fee = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $channel_payout_pct = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $channel_payout_sigle_fee = 0.00;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $fee = 0.00;  //支付的费用
	
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
     * @ORM\Column(type="string", length=15)
     */
    private $acc_type = '';
	
	/**
     * @ORM\Column(type="string", length=32)
     */
    private $account = '';
	
	/**
     * @ORM\Column(type="string", length=36)
     */
    private $acc_owner_name = '';
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $email = '';
	
	/**
     * @ORM\Column(type="string", length=22)
     */
    private $phone = '';
	
	/**
     * @ORM\Column(type="string", length=36)
     */
    private $cpf_no = '';
	
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
     * Set payoutPct
     *
     * @param string $payoutPct
     *
     * @return PayoutOrder
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
     * @return PayoutOrder
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
     * Set channelPayoutPct
     *
     * @param string $channelPayoutPct
     *
     * @return PayoutOrder
     */
    public function setChannelPayoutPct($channelPayoutPct)
    {
        $this->channel_payout_pct = $channelPayoutPct;

        return $this;
    }

    /**
     * Get channelPayoutPct
     *
     * @return string
     */
    public function getChannelPayoutPct()
    {
        return $this->channel_payout_pct;
    }

    /**
     * Set channelPayoutSigleFee
     *
     * @param string $channelPayoutSigleFee
     *
     * @return PayoutOrder
     */
    public function setChannelPayoutSigleFee($channelPayoutSigleFee)
    {
        $this->channel_payout_sigle_fee = $channelPayoutSigleFee;

        return $this;
    }

    /**
     * Get channelPayoutSigleFee
     *
     * @return string
     */
    public function getChannelPayoutSigleFee()
    {
        return $this->channel_payout_sigle_fee;
    }

    /**
     * Set fee
     *
     * @param string $fee
     *
     * @return PayoutOrder
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Get fee
     *
     * @return string
     */
    public function getFee()
    {
        return $this->fee;
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

    /**
     * Set accType
     *
     * @param string $accType
     *
     * @return PayoutOrder
     */
    public function setAccType($accType)
    {
        $this->acc_type = $accType;

        return $this;
    }

    /**
     * Get accType
     *
     * @return string
     */
    public function getAccType()
    {
        return $this->acc_type;
    }

    /**
     * Set account
     *
     * @param string $account
     *
     * @return PayoutOrder
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set accOwnerName
     *
     * @param string $accOwnerName
     *
     * @return PayoutOrder
     */
    public function setAccOwnerName($accOwnerName)
    {
        $this->acc_owner_name = $accOwnerName;

        return $this;
    }

    /**
     * Get accOwnerName
     *
     * @return string
     */
    public function getAccOwnerName()
    {
        return $this->acc_owner_name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return PayoutOrder
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return PayoutOrder
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cpfNo
     *
     * @param string $cpfNo
     *
     * @return PayoutOrder
     */
    public function setCpfNo($cpfNo)
    {
        $this->cpf_no = $cpfNo;

        return $this;
    }

    /**
     * Get cpfNo
     *
     * @return string
     */
    public function getCpfNo()
    {
        return $this->cpf_no;
    }
}
