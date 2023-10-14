<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_user_group_permission")
 */
class UserGroupPermission
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
    private $user_group_id = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $permission_id = 0;

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
     * Set userGroupId
     *
     * @param integer $userGroupId
     *
     * @return UserGroupPermission
     */
    public function setUserGroupId($userGroupId)
    {
        $this->user_group_id = $userGroupId;

        return $this;
    }

    /**
     * Get userGroupId
     *
     * @return integer
     */
    public function getUserGroupId()
    {
        return $this->user_group_id;
    }

    /**
     * Set permissionId
     *
     * @param integer $permissionId
     *
     * @return UserGroupPermission
     */
    public function setPermissionId($permissionId)
    {
        $this->permission_id = $permissionId;

        return $this;
    }

    /**
     * Get permissionId
     *
     * @return integer
     */
    public function getPermissionId()
    {
        return $this->permission_id;
    }
}
