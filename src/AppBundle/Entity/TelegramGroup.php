<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_telegram_group")
 */
class TelegramGroup
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
    private $bot_id = 0;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $group_id = "";
    
    /**
     * @ORM\Column(type="string", length=200)
     */
    private $group_name="";
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $group_tag="";
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $bind_sender_id = "";
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $bind_sender_name="";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0; //绑定时间

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
     * Set botId
     *
     * @param integer $botId
     *
     * @return TelegramGroup
     */
    public function setBotId($botId)
    {
        $this->bot_id = $botId;

        return $this;
    }

    /**
     * Get botId
     *
     * @return integer
     */
    public function getBotId()
    {
        return $this->bot_id;
    }

    /**
     * Set groupId
     *
     * @param string $groupId
     *
     * @return TelegramGroup
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return string
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set groupName
     *
     * @param string $groupName
     *
     * @return TelegramGroup
     */
    public function setGroupName($groupName)
    {
        $this->group_name = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->group_name;
    }

    /**
     * Set groupTag
     *
     * @param string $groupTag
     *
     * @return TelegramGroup
     */
    public function setGroupTag($groupTag)
    {
        $this->group_tag = $groupTag;

        return $this;
    }

    /**
     * Get groupTag
     *
     * @return string
     */
    public function getGroupTag()
    {
        return $this->group_tag;
    }

    /**
     * Set bindSenderId
     *
     * @param string $bindSenderId
     *
     * @return TelegramGroup
     */
    public function setBindSenderId($bindSenderId)
    {
        $this->bind_sender_id = $bindSenderId;

        return $this;
    }

    /**
     * Get bindSenderId
     *
     * @return string
     */
    public function getBindSenderId()
    {
        return $this->bind_sender_id;
    }

    /**
     * Set bindSenderName
     *
     * @param string $bindSenderName
     *
     * @return TelegramGroup
     */
    public function setBindSenderName($bindSenderName)
    {
        $this->bind_sender_name = $bindSenderName;

        return $this;
    }

    /**
     * Get bindSenderName
     *
     * @return string
     */
    public function getBindSenderName()
    {
        return $this->bind_sender_name;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return TelegramGroup
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
