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
		$old_staff=$this->add('customerCareApp/Model_Staff');
		if($this->loaded())
			$old_staff->addCondition('id','<>',$this->id);
		$old_staff->addCondition('name',$this['name']);
		$old_staff->tryLoadAny();
		if($old_staff->loaded())
			throw $this->exception("Already Exists!!");
	}
}