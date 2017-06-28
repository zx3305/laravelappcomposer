<?php
namespace Paytest\Repository\Entity;

use Paytest\Repository\AbstractEntity;

use Paytest\Repository\Orm\OrderOrm;

/**
 * 订单实体对象
 */
class OrderEntity extends AbstractEntity{
	private $orm;
	public function __contruct(OrderOrm $orderOrm=null){
		$this->orm = $orderOrm;
	}

	public function __get($value){
		if($this->orm){
			return $this->orm->$value;
		}
		return null;
	}
}