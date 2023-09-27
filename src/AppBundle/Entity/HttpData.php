<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_http_data")
 */
class HttpData
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
     * Set bundle
     *
     * @param string $bundle
     *
     * @return HttpData
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
     * @return HttpData
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
     * Set data
     *
     * @param string $data
     *
     * @return HttpData
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
     * @return HttpData
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
