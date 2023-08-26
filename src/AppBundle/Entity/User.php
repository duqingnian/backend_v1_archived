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
     * @ORM\Column(type="string", length=50)
     */
    private $display_name = ''; //显示名称
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $ext_type = ''; //扩展类型 SA超级管理员 MT商户 PROXY代理
	
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
     * Set extType
     *
     * @param string $extType
     *
     * @return User
     */
    public function setExtType($extType)
    {
        $this->ext_type = $extType;

        return $this;
    }

    /**
     * Get extType
     *
     * @return string
     */
    public function getExtType()
    {
        return $this->ext_type;
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
}
