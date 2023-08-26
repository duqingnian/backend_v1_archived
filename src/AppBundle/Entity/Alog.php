<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_log")
 */
class Alog
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
    private $uid = 0;
	
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $ttype = ''; //日志类型 LOGIN DELETE
	
	/**
     * @ORM\Column(type="integer")
     */
    private $data_id = 0;

    /**
     * @ORM\Column(type="text")
     */
    private $content = '';  //日志内容
    
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
     * Set uid
     *
     * @param integer $uid
     *
     * @return Alog
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set ttype
     *
     * @param string $ttype
     *
     * @return Alog
     */
    public function setTtype($ttype)
    {
        $this->ttype = $ttype;

        return $this;
    }

    /**
     * Get ttype
     *
     * @return string
     */
    public function getTtype()
    {
        return $this->ttype;
    }

    /**
     * Set dataId
     *
     * @param integer $dataId
     *
     * @return Alog
     */
    public function setDataId($dataId)
    {
        $this->data_id = $dataId;

        return $this;
    }

    /**
     * Get dataId
     *
     * @return integer
     */
    public function getDataId()
    {
        return $this->data_id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Alog
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
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return Alog
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
