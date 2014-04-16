<?php

namespace customerCareApp;

class View_Server_CustomerLogin extends \View{
	function init(){
		parent::init();

		$this->add('View_Info')->set('I Am Customer Login');
		
	}
}