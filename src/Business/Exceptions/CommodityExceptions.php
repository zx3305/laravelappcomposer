<?php
namespace Paytest\Business\Exceptions;

use Exception;

class CommodityExceptions  extends Exception{
	public function __construct($msg, $code=1){
		parent::__construct($msg, '20'.$code);
	}
}