<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_channel_notify_data")
 */
class ChannelNotifyData
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $bundle = ""; //PAYIN  PAYOUT
    
    /**
     * @ORM\Column(type="integer")
     */
    private $order_id = 0;
	
	/**
     * @ORM\Column(type="text")
     */
    private $recive_data = '';
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $channel_id = ''; //通道id
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $sh_id = ''; //商户id
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $plantform_order_no = ''; //平台订单号
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $sh_notifyed = ""; //空=>未通知  ING=>正在通知  SUCC=>已经完成通知  COMPLETE已经完成通知


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
     * Set bundle
     *
     * @param string $bundle
     *
     * @return ChannelNotifyData
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle
     *
     * @return string
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Set orderId
     *
     * @param integer $orderId
     *
     * @return ChannelNotifyData
     */
    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Set reciveData
     *
     * @param string $reciveData
     *
     * @return ChannelNotifyData
     */
    public function setReciveData($reciveData)
    {
        $this->recive_data = $reciveData;

        return $this;
    }

    /**
     * Get reciveData
     *
     * @return string
     */
    public function getReciveData()
    {
        return $this->recive_data;
    }

    /**
     * Set plantformOrderNo
     *
     * @param string $plantformOrderNo
     *
     * @return ChannelNotifyData
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
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return ChannelNotifyData
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
     * Set shNotifyed
     *
     * @param string $shNotifyed
     *
     * @return ChannelNotifyData
     */
    public function setShNotifyed($shNotifyed)
    {
        $this->sh_notifyed = $shNotifyed;

        return $this;
    }

    /**
     * Get shNotifyed
     *
     * @return string
     */
    public function getShNotifyed()
    {
        return $this->sh_notifyed;
    }

    /**
     * Set channelId
     *
     * @param string $channelId
     *
     * @return ChannelNotifyData
     */
    public function setChannelId($channelId)
    {
        $this->channel_id = $channelId;

        return $this;
    }

    /**
     * Get channelId
     *
     * @return string
     */
    public function getChannelId()
    {
        return $this->channel_id;
    }

    /**
     * Set shId
     *
     * @param string $shId
     *
     * @return ChannelNotifyData
     */
    public function setShId($shId)
    {
        $this->sh_id = $shId;

        return $this;
    }

    /**
     * Get shId
     *
     * @return string
     */
    public function getShId()
    {
        return $this->sh_id;
    }
}
