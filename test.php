<?php
class test{
	public function __set($key, $value){
echo $key,"--",$value;
	}

	public function __get($value){
echo $value;
	}
}