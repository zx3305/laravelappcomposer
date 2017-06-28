<?php
namespace Paytest\Business\Exceptions;

use App\Exceptions\CustomizeException;

namespace CommodityExceptions  extends CustomizeException{
	public function __construct($msg, $code){
		parent::__construct($msg, 20.$code);
	}
}