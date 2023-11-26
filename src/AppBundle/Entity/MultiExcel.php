<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_multi_excel")
 */
class MultiExcel
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $file="";
	
	/**
     * @ORM\Column(type="string", length=200)
     */
    private $filename="";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $sh_id = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $row = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $col = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $done_row = 0; //处理完成的行数

	/**
     * @ORM\Column(type="string", length=15)
     */
    private $status="";//processing处理中   done处理完成
	
	/**
     * @ORM\Column(type="integer")
     */
    private $done_at = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $total_amount = 0.00; 

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
     * Set file
     *
     * @param string $file
     *
     * @return MultiExcel
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set shId
     *
     * @param integer $shId
     *
     * @return MultiExcel
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
     * Set row
     *
     * @param integer $row
     *
     * @return MultiExcel
     */
    public function setRow($row)
    {
        $this->row = $row;

        return $this;
    }

    /**
     * Get row
     *
     * @return integer
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * Set col
     *
     * @param integer $col
     *
     * @return MultiExcel
     */
    public function setCol($col)
    {
        $this->col = $col;

        return $this;
    }

    /**
     * Get col
     *
     * @return integer
     */
    public function getCol()
    {
        return $this->col;
    }

    /**
     * Set doneRow
     *
     * @param integer $doneRow
     *
     * @return MultiExcel
     */
    public function setDoneRow($doneRow)
    {
        $this->done_row = $doneRow;

        return $this;
    }

    /**
     * Get doneRow
     *
     * @return integer
     */
    public function getDoneRow()
    {
        return $this->done_row;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return MultiExcel
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set doneAt
     *
     * @param integer $doneAt
     *
     * @return MultiExcel
     */
    public function setDoneAt($doneAt)
    {
        $this->done_at = $doneAt;

        return $this;
    }

    /**
     * Get doneAt
     *
     * @return integer
     */
    public function getDoneAt()
    {
        return $this->done_at;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return MultiExcel
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
     * Set filename
     *
     * @param string $filename
     *
     * @return MultiExcel
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set totalAmount
     *
     * @param string $totalAmount
     *
     * @return MultiExcel
     */
    public function setTotalAmount($totalAmount)
    {
        $this->total_amount = $totalAmount;

        return $this;
    }

    /**
     * Get totalAmount
     *
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }
}
