<?php

class page_customerCareApp_page_owner_main extends page_componentBase_page_owner_main{
	function init(){
		parent::init();

		$menu=$this->add('Menu');
		$menu->addMenuItem('customerCareApp_page_owner_config','Configraction');
		$menu->addMenuItem('customerCareApp_page_owner_department','Department');
		$menu->addMenuItem('customerCareApp_page_owner_issue','Issue');
		$menu->addMenuItem('customerCareApp_page_owner_staff','Staff');
		$menu->addMenuItem('customerCareApp_page_owner_team','team');
		$menu->addMenuItem('customerCareApp-page_owner_user','User');
		$menu->addMenuItem('customerCareApp-page_owner_user','EmailTemplate');
		
	}
}