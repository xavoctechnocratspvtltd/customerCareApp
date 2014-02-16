<?php

namespace customerCareApp;

class Model_Ticket extends \Model_Table {
	var $table= "customerCareApp_ticket";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Department','customerCareApp_department_id');
		$this->hasOne('customerCareApp/User','customerCareApp_user_id');

		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}