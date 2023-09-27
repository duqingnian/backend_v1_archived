<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_notify_data")
 */
class NotifyData
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
    private $bundle = ""; //代收结果:PAYIN_RESULT 代收回调:PAYIN_NOTIFY, 代付结果:PAYOUT_RESULT 代付回调:PAYOUT_NOTIFY
    
    /**
     * @ORM\Column(type="integer")
     */
    private $order_id = 0;
	
	/**
     * @ORM\Column(type="string", length=300)
     */
    private $url = "";
	
	/**
     * @ORM\Column(type="text")
     */
    private $notify_data = '';

	/**
     * @ORM\Column(type="integer")
     */
    private $notify_at = 0; //通知时间戳
	
	/**
     * @ORM\Column(type="integer")
     */
    private $notify_http_code = 0;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $notify_result = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $time_pip = "30s"; //通知的间隔频率一般是：30s,2m,4m,10m,30m,1h,2h,6h,15h

    /**
     * @ORM\Column(type="integer")
     */
    private $send_at = 0; //回调时间
	
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
     * @return NotifyData
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
     * @return NotifyData
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
     * Set url
     *
     * @param string $url
     *
     * @return NotifyData
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set notifyData
     *
     * @param string $notifyData
     *
     * @return NotifyData
     */
    public function setNotifyData($notifyData)
    {
        $this->notify_data = $notifyData;

        return $this;
    }

    /**
     * Get notifyData
     *
     * @return string
     */
    public function getNotifyData()
    {
        return $this->notify_data;
    }

    /**
     * Set notifyAt
     *
     * @param integer $notifyAt
     *
     * @return NotifyData
     */
    public function setNotifyAt($notifyAt)
    {
        $this->notify_at = $notifyAt;

        return $this;
    }

    /**
     * Get notifyAt
     *
     * @return integer
     */
    public function getNotifyAt()
    {
        return $this->notify_at;
    }

    /**
     * Set notifyHttpCode
     *
     * @param integer $notifyHttpCode
     *
     * @return NotifyData
     */
    public function setNotifyHttpCode($notifyHttpCode)
    {
        $this->notify_http_code = $notifyHttpCode;

        return $this;
    }

    /**
     * Get notifyHttpCode
     *
     * @return integer
     */
    public function getNotifyHttpCode()
    {
        return $this->notify_http_code;
    }

    /**
     * Set notifyResult
     *
     * @param string $notifyResult
     *
     * @return NotifyData
     */
    public function setNotifyResult($notifyResult)
    {
        $this->notify_result = $notifyResult;

        return $this;
    }

    /**
     * Get notifyResult
     *
     * @return string
     */
    public function getNotifyResult()
    {
        return $this->notify_result;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return NotifyData
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
     * Set timePip
     *
     * @param string $timePip
     *
     * @return NotifyData
     */
    public function setTimePip($timePip)
    {
        $this->time_pip = $timePip;

        return $this;
    }

    /**
     * Get timePip
     *
     * @return string
     */
    public function getTimePip()
    {
        return $this->time_pip;
    }

    /**
     * Set sendAt
     *
     * @param integer $sendAt
     *
     * @return NotifyData
     */
    public function setSendAt($sendAt)
    {
        $this->send_at = $sendAt;

        return $this;
    }

    /**
     * Get sendAt
     *
     * @return integer
     */
    public function getSendAt()
    {
        return $this->send_at;
    }
}
