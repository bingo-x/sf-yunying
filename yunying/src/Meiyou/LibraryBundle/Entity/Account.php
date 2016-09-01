<?php

namespace Fcx\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="account")
 * @ORM\Entity
 */
class Account
{
    /**
     * @var float
     *
     * @ORM\Column(name="money", type="float", precision=12, scale=2, nullable=true)
     */
    private $money;

    /**
     * @var float
     *
     * @ORM\Column(name="score", type="float", precision=12, scale=2, nullable=true)
     */
    private $score;

    /**
     * @var float
     *
     * @ORM\Column(name="bonus", type="float", precision=10, scale=0, nullable=true)
     */
    private $bonus;

    /**
     * @var float
     *
     * @ORM\Column(name="cumulativescore", type="float", precision=12, scale=2, nullable=true)
     */
    private $cumulativescore;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="isLock", type="smallint", nullable=true)
     */
    private $islock;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createTime", type="datetime", nullable=false)
     */
    private $createtime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdate", type="datetime", nullable=false)
     */
    private $lastupdate;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $userid;
    


    /**
     * Set money
     *
     * @param float $money
     * @return Account
     */
    public function setMoney($money)
    {
        $this->money = $money;
    
        return $this;
    }

    /**
     * Get money
     *
     * @return float 
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set score
     *
     * @param float $score
     * @return Account
     */
    public function setScore($score)
    {
        $this->score = $score;
    
        return $this;
    }

    /**
     * Get score
     *
     * @return float 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set bonus
     *
     * @param float $bonus
     * @return Account
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;
    
        return $this;
    }

    /**
     * Get bonus
     *
     * @return float 
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * Set cumulativescore
     *
     * @param float $cumulativescore
     * @return Account
     */
    public function setCumulativescore($cumulativescore)
    {
        $this->cumulativescore = $cumulativescore;
    
        return $this;
    }

    /**
     * Get cumulativescore
     *
     * @return float 
     */
    public function getCumulativescore()
    {
        return $this->cumulativescore;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Account
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
        
    /**
     * Set islock
     *
     * @param integer $islock
     * @return Account
     */
    public function setIslock($islock)
    {
        $this->islock = $islock;
    
        return $this;
    }

    /**
     * Get islock
     *
     * @return integer 
     */
    public function getIslock()
    {
        return $this->islock;
    }

    /**
     * Set createtime
     *
     * @param \DateTime $createtime
     * @return Account
     */
    public function setCreatetime($createtime)
    {
        $this->createtime = $createtime;
    
        return $this;
    }

    /**
     * Get createtime
     *
     * @return \DateTime 
     */
    public function getCreatetime()
    {
        return $this->createtime;
    }

    /**
     * Set lastupdate
     *
     * @param \DateTime $lastupdate
     * @return Account
     */
    public function setLastupdate($lastupdate)
    {
        $this->lastupdate = $lastupdate;
    
        return $this;
    }

    /**
     * Get lastupdate
     *
     * @return \DateTime 
     */
    public function getLastupdate()
    {
        return $this->lastupdate;
    }
    
    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }
}
