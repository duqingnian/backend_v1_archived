<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_data")
 */
class Data
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
    private $channel_id = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $sh_id = 0;
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $atype = ""; // PAYIN PAYOUT
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $bundle = ""; // CLI_DATA API_RESULT API_NOTIFY
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $plant_order_no = "";
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $http_code = "";
	
	/**
     * @ORM\Column(type="text")
     */
    private $data = '';
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;

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
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return Data
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
     * Set shId
     *
     * @param integer $shId
     *
     * @return Data
     */
    public function setShId($shId)
    {
        $this->sh_id = $shId;

        return $this;
    }

    /**
     * Get shId
     *
     * @return integer
     */
    public function getShId()
    {
        return $this->sh_id;
    }

    /**
     * Set atype
     *
     * @param string $atype
     *
     * @return Data
     */
    public function setAtype($atype)
    {
        $this->atype = $atype;

        return $this;
    }

    /**
     * Get atype
     *
     * @return string
     */
    public function getAtype()
    {
        return $this->atype;
    }

    /**
     * Set bundle
     *
     * @param string $bundle
     *
     * @return Data
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
     * Set plantOrderNo
     *
     * @param string $plantOrderNo
     *
     * @return Data
     */
    public function setPlantOrderNo($plantOrderNo)
    {
        $this->plant_order_no = $plantOrderNo;

        return $this;
    }

    /**
     * Get plantOrderNo
     *
     * @return string
     */
    public function getPlantOrderNo()
    {
        return $this->plant_order_no;
    }

    /**
     * Set httpCode
     *
     * @param string $httpCode
     *
     * @return Data
     */
    public function setHttpCode($httpCode)
    {
        $this->http_code = $httpCode;

        return $this;
    }

    /**
     * Get httpCode
     *
     * @return string
     */
    public function getHttpCode()
    {
        return $this->http_code;
    }

    /**
     * Set data
     *
     * @param string $data
     *
     * @return Data
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return Data
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
