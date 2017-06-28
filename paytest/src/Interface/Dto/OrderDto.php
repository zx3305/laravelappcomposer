<?php 
namespace Paytest\Interface\Dto;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 处理服务接口接收、输出、调用的数据对象转换(这里的职责划分请灵活处理)
 */

class OrderDto {
	private $requestData;
	/**
	 * 设置request数据
	 */
	public function setRequestData(FormRequest $request){
		$this->requestData = $request->all();
	}

	/**
	 * 获取订单id
	 */
	public function getOrderId(){
		return isset($this->requestData['orderId']) ? $this->requestData['orderId']: null;
	}

	/**
	 * 获取库存
	 */
	public function getStock(){
		return isset($this->requestData['stock']) ? $this->requestData['stock']: null;
	}

	/**
	 * 获取消费者订单数据
	 */
	public function getCustomerOrder($data){
		// to do somethings
		return $data;
	}
}