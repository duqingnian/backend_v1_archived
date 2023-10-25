<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_telegram_bot_command")
 */
class TelegramBotCmd
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
     * @ORM\Column(type="string", length=30)
     */
    private $const_name="";
	
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $custom_name="";
	
	/**
     * @ORM\Column(type="text")
     */
    private $const_content="";


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
     * @return TelegramBotCmd
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
     * Set constName
     *
     * @param string $constName
     *
     * @return TelegramBotCmd
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
     * Set customName
     *
     * @param string $customName
     *
     * @return TelegramBotCmd
     */
    public function setCustomName($customName)
    {
        $this->custom_name = $customName;

        return $this;
    }

    /**
     * Get customName
     *
     * @return string
     */
    public function getCustomName()
    {
        return $this->custom_name;
    }

    /**
     * Set constContent
     *
     * @param string $constContent
     *
     * @return TelegramBotCmd
     */
    public function setConstContent($constContent)
    {
        $this->const_content = $constContent;

        return $this;
    }

    /**
     * Get constContent
     *
     * @return string
     */
    public function getConstContent()
    {
        return $this->const_content;
    }
}
