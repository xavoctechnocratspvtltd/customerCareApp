<?php

namespace customerCareApp;

class Model_Department extends \Model_Table {
	var $table= "customerCareApp_department";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Company','customerCareApp_company_id');

		$this->addField('name');

		$this->hasMany('customerCareApp/Team','customerCareApp_department_id');
		$this->hasMany('customerCareApp/Ticket','customerCareApp_department_id');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}