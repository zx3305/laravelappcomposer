<?php
namespace Paytest\Repository;
use Exception;

abstract class  AbstractEntity{
	public function __set($key, $value){
		if(!is_string($value)){
			throw new Exception("实体属性只能是字符串");
		}
		$this->$key = $value;
	}
}