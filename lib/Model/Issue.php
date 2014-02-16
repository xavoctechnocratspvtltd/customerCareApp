<?php

namespace customerCareApp;

class Model_Issue extends \Model_Table {
	var $table= "customerCareApp_issue";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Company','customerCareApp_company_id');

		$this->addField('name');

		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){
		
	}
}