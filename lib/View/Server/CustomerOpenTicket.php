<?php

namespace customerCareApp;

class View_Server_CustomerOpenTicket extends \View{
	function init(){
		parent::init();

		$this->add('View_Info')->set('I Am Customer Open Ticket');
		
	}
}