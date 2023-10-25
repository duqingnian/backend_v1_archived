<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_telegram_bot_announcement")
 */
class TelegramBotAnn
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
     * @ORM\Column(type="text")
     */
    private $content = "";
	
	/**
     * @ORM\Column(type="text")
     */
    private $send_to = "";
	
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
     * @return TelegramBotAnn
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
     * Set content
     *
     * @param string $content
     *
     * @return TelegramBotAnn
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set sendTo
     *
     * @param string $sendTo
     *
     * @return TelegramBotAnn
     */
    public function setSendTo($sendTo)
    {
        $this->send_to = $sendTo;

        return $this;
    }

    /**
     * Get sendTo
     *
     * @return string
     */
    public function getSendTo()
    {
        return $this->send_to;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return TelegramBotAnn
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
