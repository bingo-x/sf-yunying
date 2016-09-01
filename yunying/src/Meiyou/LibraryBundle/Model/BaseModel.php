<?php
namespace Fcx\LibraryBundle\Model;

use Doctrine\ORM\EntityManager;
use Fcx\LibraryBundle\Utility\LogHandler;
use Fcx\LibraryBundle\Common\CommonDefine;


class BaseModel
{
	protected  $entityManager;
	protected  $entity;

        public function __construct(EntityManager $entityManager)
        {
            $this->entityManager = $entityManager;
        }
        
        protected function getOne($arr = array(), array $orderBy = null)
        {
                $arr["status"] = CommonDefine::DATA_STATUS_NORMAL;
		return $this->entityManager->getRepository($this->entity)->findOneBy($arr, $orderBy);
        }
        
        protected function getAll($arr = array(), array $orderBy = null, $limit = null, $offset = null)
        {
                $arr["status"] = CommonDefine::DATA_STATUS_NORMAL;
		return $this->entityManager->getRepository($this->entity)->findBy($arr, $orderBy, $limit, $offset);
        }
        
        protected function getAllByCondition($alias, $where = '', $paramArr = array(), $orderby = array())
	{
                $query = $this->entityManager->createQueryBuilder();
                $query->select($alias)
                ->from($this->entity, $alias)
                ->where($where)
                ->setParameters($paramArr);
                foreach ($orderby as $key => $val) {
                        $query->addOrderBy($key, $val);
                }
                return $query->getQuery()->getResult();
	}
        
        protected function add($entity)
        {
                try {
                        $entity->setStatus(CommonDefine::DATA_STATUS_NORMAL);
                        $entity->setCreateTime(new \DateTime());
                        $entity->setLastUpdate(new \DateTime());
                        $this->entityManager->persist($entity);
                        $this->entityManager->flush($entity);
                }
                catch (\Exception $ex)
		{
			$this->writeErrorLog($ex,__CLASS__,__FUNCTION__);
		}
        }
        
        protected function edit($entity)
        {
                try {
                        $entity->setLastUpdate(new \DateTime());
                        $this->entityManager->flush($entity);
                }
                catch (\Exception $ex)
		{
			$this->writeErrorLog($ex,__CLASS__,__FUNCTION__);
		}
        }
        
        protected function delete($entity)
        {
                try {
                        $entity->setStatus(CommonDefine::DATA_STATUS_DELETE);
                        $entity->setLastUpdate(new \DateTime());
                        $this->entityManager->flush($entity);
                }
                catch (\Exception $ex)
		{
			$this->writeErrorLog($ex,__CLASS__,__FUNCTION__);
		}
        }
        
	protected function writeErrorLog($ex, $class, $function)
	{
		LogHandler::writeLog(date("Y-m-d H:i:s")."\r\n".strval($ex)."\r\n\r\n",$class."/".$function);
	}
}

?>