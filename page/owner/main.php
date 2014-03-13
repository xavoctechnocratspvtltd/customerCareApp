<?php

class page_customerCareApp_page_owner_main extends page_componentBase_page_owner_main{
	function init(){
		parent::init();

		$menu=$this->add('Menu');
		$menu->addMenuItem('customerCareApp_page_owner_company','Company');
		$menu->addMenuItem('customerCareApp_page_owner_department','Department');
		$menu->addMenuItem('customerCareApp_page_owner_team','Team');
		$menu->addMenuItem('customerCareApp_page_owner_staff','Staff');
		$menu->addMenuItem('customerCareApp_page_owner_issue','Issue');
		$menu->addMenuItem('customerCareApp_page_owner_priority','Priority');
		$menu->addMenuItem('customerCareApp_page_owner_status','Status');
		$menu->addMenuItem('customerCareApp_page_owner_emailTemplate','EmailTemplate');
		$menu->addMenuItem('customerCareApp_page_owner_user','User');
		$menu->addMenuItem('customerCareApp_page_owner_config','Configuration');
		$menu->addMenuItem('customerCareApp_page_owner_ticket','Ticket');
		
	}
}