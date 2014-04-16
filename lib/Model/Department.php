<?php

namespace customerCareApp;

class Model_Department extends \Model_Table {
	var $table= "customerCareApp_department";
	function init(){
		parent::init();

		// $this->hasOne('customerCareApp/Config','config_id');

		$this->addField('name');
		$this->addField('description')->type('text');

		$this->hasMany('customerCareApp/Staff','department_id');

		// $this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}
	// function beforeDelete(){
	
	// }
	
	function beforeSave(){
		//One epan can not have two or more same name department

		$old_department=$this->add('customerCareApp/Model_Department');
		if($this->loaded())
			$old_department->addCondition('id','<>',$this->id);
		$old_department->addCondition('name',$this['name']);
		$old_department->tryLoadAny();
		if($old_department->loaded())
			throw $this->exception("Already Exists!!");
	}
}