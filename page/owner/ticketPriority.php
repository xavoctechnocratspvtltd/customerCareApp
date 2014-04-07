<?php
class page_customerCareApp_page_owner_ticketPriority extends page_customerCareApp_page_owner_main{
	function init(){
		parent::init();
		$crud=$this->add('CRUD');
		$crud->setModel('customerCareApp/TicketPriority');
		
	}
}
