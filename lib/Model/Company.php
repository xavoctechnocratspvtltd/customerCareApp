<?php

namespace customerCareApp;

class Model_Company extends \Model_Table {
	var $table= "customerCareApp_company";
	function init(){
		parent::init();


		$this->addField('name');

		$this->hasMany('customerCareApp/Department','customerCareApp_company_id');
		$this->hasMany('customerCareApp/User','customerCareApp_company_id');
		$this->hasMany('customerCareApp/Issue','customerCareApp_company_id');
		$this->hasMany('customerCareApp/EmailTemplate','customerCareApp_company_id');


		$this->add('dynamic_model/Controller_AutoCreator');
	}
}