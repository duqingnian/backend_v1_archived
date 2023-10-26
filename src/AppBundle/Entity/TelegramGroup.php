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
     * @ORM\Column(type="string", length=100)
     */
    private $appid = "";
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $tag="";
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $bind_from_id = "";
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $bind_from_name="";
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $chat_id = "";
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $chat_title="";
	
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
     * Set appid
     *
     * @param string $appid
     *
     * @return TelegramGroup
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;

        return $this;
    }

    /**
     * Get appid
     *
     * @return string
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return TelegramGroup
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set bindFromId
     *
     * @param string $bindFromId
     *
     * @return TelegramGroup
     */
    public function setBindFromId($bindFromId)
    {
        $this->bind_from_id = $bindFromId;

        return $this;
    }

    /**
     * Get bindFromId
     *
     * @return string
     */
    public function getBindFromId()
    {
        return $this->bind_from_id;
    }

    /**
     * Set bindFromName
     *
     * @param string $bindFromName
     *
     * @return TelegramGroup
     */
    public function setBindFromName($bindFromName)
    {
        $this->bind_from_name = $bindFromName;

        return $this;
    }

    /**
     * Get bindFromName
     *
     * @return string
     */
    public function getBindFromName()
    {
        return $this->bind_from_name;
    }

    /**
     * Set chatId
     *
     * @param string $chatId
     *
     * @return TelegramGroup
     */
    public function setChatId($chatId)
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * Get chatId
     *
     * @return string
     */
    public function getChatId()
    {
        return $this->chat_id;
    }

    /**
     * Set chatTitle
     *
     * @param string $chatTitle
     *
     * @return TelegramGroup
     */
    public function setChatTitle($chatTitle)
    {
        $this->chat_title = $chatTitle;

        return $this;
    }

    /**
     * Get chatTitle
     *
     * @return string
     */
    public function getChatTitle()
    {
        return $this->chat_title;
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
