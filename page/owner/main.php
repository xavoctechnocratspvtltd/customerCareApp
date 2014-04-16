<?php

class page_customerCareApp_page_owner_main extends page_componentBase_page_owner_main{
	function init(){
		parent::init();

		$menu=$this->add('Menu');

		$menu->addMenuItem('customerCareApp_page_owner_config','Configuration');
		$menu->addMenuItem('customerCareApp_page_owner_customer','Customer');
		$menu->addMenuItem('customerCareApp_page_owner_emailTemplate','Email Template');
		$menu->addMenuItem('customerCareApp_page_owner_department','Department');
		$menu->addMenuItem('customerCareApp_page_owner_staff','Staff');
		$menu->addMenuItem('customerCareApp_page_owner_project','Project');
		$menu->addMenuItem('customerCareApp_page_owner_ticket','Ticket');
		$menu->addMenuItem('customerCareApp_page_owner_ticketPriority','Ticket Priority');
		$menu->addMenuItem('customerCareApp_page_owner_ticketStatus','Ticket Status');
		$menu->addMenuItem('customerCareApp_page_owner_ticketType','Ticket Type');
		
	}
}