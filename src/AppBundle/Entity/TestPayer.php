<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="test_payer")
 */
class TestPayer
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
    private $account;
    
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $amount = 0.00;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $df_pool = 0.00;

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
     * Set account
     *
     * @param string $account
     *
     * @return TestPayer
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return TestPayer
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set dfPool
     *
     * @param integer $dfPool
     *
     * @return TestPayer
     */
    public function setDfPool($dfPool)
    {
        $this->df_pool = $dfPool;

        return $this;
    }

    /**
     * Get dfPool
     *
     * @return integer
     */
    public function getDfPool()
    {
        return $this->df_pool;
    }
}
