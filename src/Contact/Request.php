<?php

namespace Paytest\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Exception;
use Validator;

abstract class Request extends FormRequest
{	
	protected $identifyMethod = false;
	
    public function authorize()
    {
        return true;
    }
	
    public function rules(){
    	return [];
    }
    
    public function withValidator($validator){
    	$validator->after(function($validator){
    		$rules = $this->getRules();
    		$errorMsg = [];
    		if(method_exists($this, 'getErrorMsg')){
    			$errorMsg = $this->getErrorMsg();
    		}
    		
			$segments = array_reverse($this->segments());
    		if($this->identifyMethod){
				$rules = $rules[$segments[0]];
				if(!empty($errorMsg)){
					$errorMsg = $errorMsg[$segments[0]];
				}
    		}
    		
    		$vali = Validator::make($this->input(), $rules, $errorMsg);	
    		if($vali->fails()){
    		   $messages = $vali->errors();
            	foreach ($messages->all() as $message) {
 			   		throw new Exception($message);
 			   		return false;
            	}
    		}
    	});
    }
    /**
     * 返回验证的规则
     * 例如
     * [
     * 		'id' => 'required|integer',
     * 		....
     * ]
     * 如果identifyMethod 设置为true
     * 则格式为：
     * [
     * 		'listajax' => [
     * 			'id' => 'required|integer'
     * 		]
     * ]
     * 其中 listajax为方法名称
     */
    abstract function getRules();
}
