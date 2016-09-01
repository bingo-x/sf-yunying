<?php
namespace Fcx\LibraryBundle\Model\MongoDB;

use Doctrine\ODM\MongoDB\DocumentManager;
use Fcx\LibraryBundle\Document\HouseDoc;

class HouseMD extends BaseMD
{
        protected $document = "FcxLibraryBundle:HouseDoc";
	
	public function getHouse($id)
	{
		return $this->getOne(array("Id" => $id));
	}
	
	public function getByHouseId($houseId)
	{
		return $this->getOne(array("houseId" => $houseId));
	}
	
	public function getBoxHouse($longitude1, $latitude1, $longitude2, $latitude2, $limit = null)
	{
		$longitude1 = floatval($longitude1);
		$latitude1 = floatval($latitude1);
		$longitude2 = floatval($longitude2);
		$latitude2 = floatval($latitude2);
		$query = $this->documentManager->createQueryBuilder("FcxLibraryBundle:HouseDoc")
		->field("coordinate")
		->withinBox($longitude1, $latitude1, $longitude2, $latitude2);
                
                if (isset($limit))
                {
                        $query->limit($limit);
                }
		
		return $query->getQuery()->execute()->toArray();
	}
	
	public function addHouse(HouseDoc $document)
	{
		$this->add($document);
	}
	
	public function editHouse(HouseDoc $document)
	{
		$this->edit($document);
	}
	
	public function deleteHouse($id)
	{
		$document = $this->getHouse($id);
		$this->delete($document);
	}
}


?>