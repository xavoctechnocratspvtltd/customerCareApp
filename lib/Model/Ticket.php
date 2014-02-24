<?php

namespace customerCareApp;

class Model_Ticket extends \Model_Table {
	var $table= "customerCareApp_ticket";
	function init(){
		parent::init();
		$this->hasOne('customerCareApp/Company','company_id');
		$this->hasOne('customerCareApp/Department','department_id');
		$this->hasOne('customerCareApp/User','user_id');
		$this->hasOne('customerCareApp/Ticket_Priority','ticket_priority_id');

		$this->addField('name');

		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){
		
	}
}