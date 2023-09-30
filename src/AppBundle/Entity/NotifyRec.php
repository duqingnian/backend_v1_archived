<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_notify_rec")
 */
class NotifyRec
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
    private $notify_data_id = 0;
	
	/**
     * @ORM\Column(type="string", length=300)
     */
    private $url = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $notify_http_code = 0;
	
	/**
     * @ORM\Column(type="string", length=200)
     */
    private $notify_result = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $time_pip = ""; 

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
     * Set notifyDataId
     *
     * @param integer $notifyDataId
     *
     * @return NotifyRec
     */
    public function setNotifyDataId($notifyDataId)
    {
        $this->notify_data_id = $notifyDataId;

        return $this;
    }

    /**
     * Get notifyDataId
     *
     * @return integer
     */
    public function getNotifyDataId()
    {
        return $this->notify_data_id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return NotifyRec
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
     * Set notifyHttpCode
     *
     * @param integer $notifyHttpCode
     *
     * @return NotifyRec
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
     * @return NotifyRec
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
     * @return NotifyRec
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
     * @return NotifyRec
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
