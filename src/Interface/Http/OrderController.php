<?php
namespace Paytest\Interface\Http;

use App\Http\Controllers\Controller;
use Paytest\Interface\Rules\OrderValidation;
use Paytest\Services\Query\OrderQuery;
use Paytest\Services\Manager\orderManager;

/**
 * 订单控制器，管理订单业务的生命周期（下单、支付、取消）
 */
class OrderController extends Controller {
	/**
	 * 获取订单(用户区分)
	 */
	public function getOrder(OrderValidation $request){
		$orderId = $request->input('orderId');
		$orderQuery = new OrderQuery();

		$userType = 1;				// 标识消费者

		$orderDto = new OrderDto();

		if($userType == 1){				// 消费者访问订单数据
			return $this->successJsonResponse($orderDto->getCustomerOrder($orderQuery->getOrder($orderId)));			
		}				
	}

	/**
	 * 下单
	 */
	public function add(OrderValidation $request){
		$stock = $request->input('stock');
		$money = $request->input('money');
		$commodityId = $request->input('commodityId');

		//调用服务管理层
		$orderManager = new orderManager();
		$orderId = $orderManager->add($commodityId, $stock, $money);

		return $this->successJsonResponse(['orderId'=>$orderId]);
	}

	/**
	 * 支付
	 */
	public function pay(){
		
	}
}