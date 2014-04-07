<?php

namespace customerCareApp;

class Model_Department extends \Model_Table {
	var $table= "customerCareApp_department";
	function init(){
		parent::init();


		$this->addField('name');

		$this->hasMany('customerCareApp/Team','department_id');
		$this->hasMany('customerCareApp/Ticket','department_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}
	function beforeDelete(){
	
	}
	
	function beforeSave(){
<<<<<<< HEAD
		$old_department=$this->add('customerCareApp/Model_Departmentx	');
=======
		//One epan can not have two or more same name department

		$old_department=$this->add('customerCareApp/Model_Department');
>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c
		if($this->loaded())
			$old_department->addCondition('id','<>',$this->id);
		$old_department->addCondition('name',$this['name']);
		$old_department->tryLoadAny();
		if($old_department->loaded())
			throw $this->exception("Already Exists!!");
<<<<<<< HEAD
		
		
		
=======
>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c
	}
}