<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_channel_bank_code")
 */
class ChannelBankCode
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
    private $name=""; //平台银行名称
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $slug=""; //通道银行名称
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $code=""; //通道银行代码

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
     * @return ChannelBankCode
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
     * Set name
     *
     * @param string $name
     *
     * @return ChannelBankCode
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return ChannelBankCode
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return ChannelBankCode
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
