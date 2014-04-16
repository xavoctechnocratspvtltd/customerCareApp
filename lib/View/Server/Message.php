<?php

namespace customerCareApp;

class View_Server_Message extends \View{
	function init(){
		parent::init();

		$this->add('View_Info')->set('I Am Message');
		
	}
}