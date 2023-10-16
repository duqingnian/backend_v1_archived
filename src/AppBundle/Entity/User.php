<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
		/**
     * @ORM\Column(type="string", length=15)
     */
    private $acc_type="";
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $display_name="";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $group_id = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_active = 0;
	
    /**
     * @ORM\Column(type="integer")
     */
    private $google_auth_bind = 0;
	
	/**
     * @ORM\Column(type="string", length=32)
     */
    private $google_secret="";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set accType
     *
     * @param string $accType
     *
     * @return User
     */
    public function setAccType($accType)
    {
        $this->acc_type = $accType;

        return $this;
    }

    /**
     * Get accType
     *
     * @return string
     */
    public function getAccType()
    {
        return $this->acc_type;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return User
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
     * Set displayName
     *
     * @param string $displayName
     *
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return User
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set googleAuthBind
     *
     * @param integer $googleAuthBind
     *
     * @return User
     */
    public function setGoogleAuthBind($googleAuthBind)
    {
        $this->google_auth_bind = $googleAuthBind;

        return $this;
    }

    /**
     * Get googleAuthBind
     *
     * @return integer
     */
    public function getGoogleAuthBind()
    {
        return $this->google_auth_bind;
    }

    /**
     * Set googleSecret
     *
     * @param string $googleSecret
     *
     * @return User
     */
    public function setGoogleSecret($googleSecret)
    {
        $this->google_secret = $googleSecret;

        return $this;
    }

    /**
     * Get googleSecret
     *
     * @return string
     */
    public function getGoogleSecret()
    {
        return $this->google_secret;
    }
}
