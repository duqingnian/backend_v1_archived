<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_telegram_bot")
 */
class TelegramBot
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
    private $name="";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $sh_id = 0;
	
	/**
     * @ORM\Column(type="string", length=16)
     */
    private $telegram_group_id="";
	
	/**
     * @ORM\Column(type="string", length=64)
     */
    private $token="";
	
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
     * Set name
     *
     * @param string $name
     *
     * @return TelegramBot
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
     * Set shId
     *
     * @param integer $shId
     *
     * @return TelegramBot
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
     * Set token
     *
     * @param string $token
     *
     * @return TelegramBot
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return TelegramBot
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
     * Set telegramGroupId
     *
     * @param string $telegramGroupId
     *
     * @return TelegramBot
     */
    public function setTelegramGroupId($telegramGroupId)
    {
        $this->telegram_group_id = $telegramGroupId;

        return $this;
    }

    /**
     * Get telegramGroupId
     *
     * @return string
     */
    public function getTelegramGroupId()
    {
        return $this->telegram_group_id;
    }
}
