<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_channel_status_map")
 */
class ChannelStatusMap
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
     * @ORM\Column(type="string", length=50)
     */
    private $atype="";//代收PAYIN 代付PAYOUT
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $bundle=''; //类型 创建？查询？回调
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $const_name=''; //常量,比如：SUCCESS
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $channel_var=''; //通道对应的值


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
     * @return ChannelStatusMap
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
     * Set bundle
     *
     * @param string $bundle
     *
     * @return ChannelStatusMap
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
     * Set constName
     *
     * @param string $constName
     *
     * @return ChannelStatusMap
     */
    public function setConstName($constName)
    {
        $this->const_name = $constName;

        return $this;
    }

    /**
     * Get constName
     *
     * @return string
     */
    public function getConstName()
    {
        return $this->const_name;
    }

    /**
     * Set channelVar
     *
     * @param string $channelVar
     *
     * @return ChannelStatusMap
     */
    public function setChannelVar($channelVar)
    {
        $this->channel_var = $channelVar;

        return $this;
    }

    /**
     * Get channelVar
     *
     * @return string
     */
    public function getChannelVar()
    {
        return $this->channel_var;
    }

    /**
     * Set atype
     *
     * @param string $atype
     *
     * @return ChannelStatusMap
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
}
