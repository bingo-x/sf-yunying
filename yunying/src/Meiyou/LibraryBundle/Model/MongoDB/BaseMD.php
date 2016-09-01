<?php

namespace Fcx\LibraryBundle\Model\MongoDB;

use Doctrine\ODM\MongoDB\DocumentManager;
use Fcx\LibraryBundle\Utility\LogHandler;
use Knp\Component\Pager\Paginator;

class BaseMD {

            protected $documentManager;
            protected $documentPaginator;
            protected $document;

            public function __construct(DocumentManager $manager,Paginator $paginator) {
                $this->documentManager = $manager;
                $this->documentPaginator=$paginator;
            }

            protected function getOne($arr = array()) {
                return $this->documentManager->getRepository($this->document)->findOneBy($arr);
            }

            protected function getAll($arr = array()) {
                return $this->documentManager->getRepository($this->document)->findBy($arr);
            }

            protected function add($document) {
                try {
                    $document->setCreateTime(new \DateTime());
                    $document->setLastUpdate(new \DateTime());
                    $this->documentManager->persist($document);
                    $this->documentManager->flush($document);
                } catch (\Exception $ex) {
                    $this->writeErrorLog($ex, __CLASS__, __FUNCTION__);
                }
            }

            protected function edit($document) {
                try {
                    $document->setLastUpdate(new \DateTime());
                    $this->documentManager->flush($document);
                } catch (\Exception $ex) {
                    $this->writeErrorLog($ex, __CLASS__, __FUNCTION__);
                }
            }

            protected function delete($document) {
                try {
                    $this->documentManager->remove($document);
                    $this->documentManager->flush();
                } catch (\Exception $ex) {
                    $this->writeErrorLog($ex, __CLASS__, __FUNCTION__);
                }
            }

            protected function writeErrorLog($ex, $class, $function) {
                LogHandler::writeLog(date("Y-m-d H:i:s") . "\r\n" . strval($ex) . "\r\n\r\n", $class . "/" . $function);
            }

}

?>