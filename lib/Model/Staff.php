<?php

namespace customerCareApp;

class Model_Staff extends \Model_Table {
	var $table= "customerCareApp_staff";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Team','team_id');

		$this->addField('name');

		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){
		
	}
}