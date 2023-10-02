<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_channel_column")
 */
class ChannelColumn
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
     * @ORM\Column(type="string", length=50)
     */
    private $bundle="";//请求：REQUEST 相应:RESPONSE 回调:NOTIFY
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $const_name; //预定义名称 创建成功字段:CREATE_SUCC_COLUMN_NAME=code   创建成功值:CREATE_SUCC_COLUMN_VALUE=0
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $channel_column_name; //code
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $channel_column_value; //0
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_join_encryp = 1; //是否参与加密
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_require = 0; //是否必填
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_show = 0; //是否显示

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
     * @return ChannelColumn
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
     * Set atype
     *
     * @param string $atype
     *
     * @return ChannelColumn
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
     * @return ChannelColumn
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
     * @return ChannelColumn
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
     * Set channelColumnName
     *
     * @param string $channelColumnName
     *
     * @return ChannelColumn
     */
    public function setChannelColumnName($channelColumnName)
    {
        $this->channel_column_name = $channelColumnName;

        return $this;
    }

    /**
     * Get channelColumnName
     *
     * @return string
     */
    public function getChannelColumnName()
    {
        return $this->channel_column_name;
    }

    /**
     * Set channelColumnValue
     *
     * @param string $channelColumnValue
     *
     * @return ChannelColumn
     */
    public function setChannelColumnValue($channelColumnValue)
    {
        $this->channel_column_value = $channelColumnValue;

        return $this;
    }

    /**
     * Get channelColumnValue
     *
     * @return string
     */
    public function getChannelColumnValue()
    {
        return $this->channel_column_value;
    }

    /**
     * Set isRequire
     *
     * @param integer $isRequire
     *
     * @return ChannelColumn
     */
    public function setIsRequire($isRequire)
    {
        $this->is_require = $isRequire;

        return $this;
    }

    /**
     * Get isRequire
     *
     * @return integer
     */
    public function getIsRequire()
    {
        return $this->is_require;
    }

    /**
     * Set isShow
     *
     * @param integer $isShow
     *
     * @return ChannelColumn
     */
    public function setIsShow($isShow)
    {
        $this->is_show = $isShow;

        return $this;
    }

    /**
     * Get isShow
     *
     * @return integer
     */
    public function getIsShow()
    {
        return $this->is_show;
    }

    /**
     * Set isJoinEncryp
     *
     * @param integer $isJoinEncryp
     *
     * @return ChannelColumn
     */
    public function setIsJoinEncryp($isJoinEncryp)
    {
        $this->is_join_encryp = $isJoinEncryp;

        return $this;
    }

    /**
     * Get isJoinEncryp
     *
     * @return integer
     */
    public function getIsJoinEncryp()
    {
        return $this->is_join_encryp;
    }
}
