<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_sh_notify_data")
 */
class ShNotifyData
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
     * @ORM\Column(type="string", length=300)
     */
    private $notify_url = ""; //通知给商户的地址
	
	/**
     * @ORM\Column(type="text")
     */
    private $notify_data = ''; //通知的数据

	/**
     * @ORM\Column(type="integer")
     */
    private $result_http_code = 0;
	
	/**
     * @ORM\Column(type="string", length=200)
     */
    private $result_data = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $time_pip = "30s"; //通知的间隔频率一般是：30s,2m,4m,10m,30m,1h,2h,6h,15h

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
     * @return ShNotifyData
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
     * @return ShNotifyData
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
     * Set notifyUrl
     *
     * @param string $notifyUrl
     *
     * @return ShNotifyData
     */
    public function setNotifyUrl($notifyUrl)
    {
        $this->notify_url = $notifyUrl;

        return $this;
    }

    /**
     * Get notifyUrl
     *
     * @return string
     */
    public function getNotifyUrl()
    {
        return $this->notify_url;
    }

    /**
     * Set notifyData
     *
     * @param string $notifyData
     *
     * @return ShNotifyData
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
     * Set resultHttpCode
     *
     * @param integer $resultHttpCode
     *
     * @return ShNotifyData
     */
    public function setResultHttpCode($resultHttpCode)
    {
        $this->result_http_code = $resultHttpCode;

        return $this;
    }

    /**
     * Get resultHttpCode
     *
     * @return integer
     */
    public function getResultHttpCode()
    {
        return $this->result_http_code;
    }

    /**
     * Set resultData
     *
     * @param string $resultData
     *
     * @return ShNotifyData
     */
    public function setResultData($resultData)
    {
        $this->result_data = $resultData;

        return $this;
    }

    /**
     * Get resultData
     *
     * @return string
     */
    public function getResultData()
    {
        return $this->result_data;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return ShNotifyData
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
     * @return ShNotifyData
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
}
