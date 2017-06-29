<?php
namespace Paytest\Business\Exceptions;

use App\Exceptions\CustomizeException;

class CommodityExceptions  extends CustomizeException{
	public function __construct($msg, $code=1){
		parent::__construct($msg, '20'.$code);
	}
}