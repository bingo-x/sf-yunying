<?php
namespace Fcx\LibraryBundle\Model;

use Fcx\LibraryBundle\Entity\Account;
use Fcx\LibraryBundle\Common\CommonDefine;

class AccountModel extends BaseModel
{
        protected  $entity = "FcxLibraryBundle:Account";
	
        public function getAccount($userid)
	{
                return $this->getOne(array("userid" => $userid));
	}
        
        public function getByUserId($userid)
	{
                return $this->getOne(array("userid" => $userid));
	}
	
	public function addAccount(Account $entity)
	{
                // 由数据库的出发器生成数据
//		$this->add($entity);
//		return $entity->getUserid();
	}
	
	public function editAccount(Account $entity)
	{
		$this->edit($entity);
	}
	
	public function deleteAccount($userid)
	{
		$entity = $this->getAccount($userid);
		$this->delete($entity);
	}
	
	public function updateAccount(Account $entity, $money = 0, $score = 0, $bonus = 0)
	{
                $where = "a.status=" . CommonDefine::DATA_STATUS_NORMAL . " and a.userid=" . $entity->getUserid();
                
                // 上锁条件
                $where .= " and a.islock=" . CommonDefine::DATA_UNLOCK;
                
                $query = $this->entityManager->createQueryBuilder();
                $result = $query
                                ->update($this->entity, 'a')
                                ->set("a.islock", CommonDefine::DATA_LOCK)
                                ->where($where)
                                ->getQuery()->execute();
                
                // 只执行并发中的一个
                if($result > 0){
                        $query = $this->entityManager->createQueryBuilder();
                        $result = $query
                                ->update($this->entity, 'a')
                                ->set("a.money", "a.money+".$money)
                                ->set("a.score", "a.score+".$score)
                                ->set("a.bonus", "a.bonus+".$bonus)
                                ->set("a.islock", CommonDefine::DATA_UNLOCK)
                                ->where('a.userid='.$entity->getUserid().' and a.money+'.$money.'>=0 and a.score+'.$score.'>=0 and a.bonus+'.$bonus.'>=0')
                                ->getQuery()->execute();
                        if($result > 0){
                                return true;
                        }
                        
                        // 执行不成功则单独执行解锁操作
                        $query = $this->entityManager->createQueryBuilder();
                        $query
                                ->update($this->entity, 'a')
                                ->set("a.islock", CommonDefine::DATA_UNLOCK)
                                ->where('a.userid='.$entity->getUserid())
                                ->getQuery()->execute();
                }
                return false;
	}
}


?>