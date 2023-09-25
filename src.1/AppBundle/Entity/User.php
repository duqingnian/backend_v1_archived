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
     * @ORM\Column(type="string", length=10)
     */
    private $acc_type="";
	
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
}
