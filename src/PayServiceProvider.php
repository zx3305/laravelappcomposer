<?php
namespace Paytest;

use Illuminate\Support\ServiceProvider;

class PayServiceProvider extends ServiceProvider {
	public function boot(){
		$this->loadRoutesFrom(__DIR__.'/Contact/routes.php');
	}
	
	public function register(){
		
	}
}