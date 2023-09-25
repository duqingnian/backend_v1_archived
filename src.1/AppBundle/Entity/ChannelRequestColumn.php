<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_channel_request_column")
 */
class ChannelRequestColumn
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
    private $master_id = 0;
	
	/**
     * @ORM\Column(type="string", length=5)
     */
    private $bundle=""; //in ? out
	
    /**
     * @ORM\Column(type="string", length=15)
     */
    private $request_column="";
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $note="";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_require = 0;
	

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
     * Set masterId
     *
     * @param integer $masterId
     *
     * @return ChannelRequestColumn
     */
    public function setMasterId($masterId)
    {
        $this->master_id = $masterId;

        return $this;
    }

    /**
     * Get masterId
     *
     * @return integer
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Set bundle
     *
     * @param string $bundle
     *
     * @return ChannelRequestColumn
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle
     *
     * @return string
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Set requestColumn
     *
     * @param string $requestColumn
     *
     * @return ChannelRequestColumn
     */
    public function setRequestColumn($requestColumn)
    {
        $this->request_column = $requestColumn;

        return $this;
    }

    /**
     * Get requestColumn
     *
     * @return string
     */
    public function getRequestColumn()
    {
        return $this->request_column;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return ChannelRequestColumn
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set isRequire
     *
     * @param integer $isRequire
     *
     * @return ChannelRequestColumn
     */
    public function setIsRequire($isRequire)
    {
        $this->is_require = $isRequire;

        return $this;
    }

    /**
     * Get isRequire
     *
     * @return integer
     */
    public function getIsRequire()
    {
        return $this->is_require;
    }
}
