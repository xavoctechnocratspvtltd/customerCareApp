<?php

namespace customerCareApp;

class Model_Staff extends \Model_Table {
	var $table= "customerCareApp_staff";
	function init(){
		parent::init();

		// $this->hasOne('customerCareApp/Config','config_id');
		$this->hasOne('customerCareApp/Department','department_id');

		$this->addField('name');
		$this->addField('employee_code');
		$this->addField('designation');
		$this->addField('phone_number');
		$this->addField('email');
		$this->addField('address');
		$this->addField('gender')->enum(array('Male','Female'));
		$this->addField('dob')->type('date');
		$this->addField('doj')->type('date');
		$this->addField('password');

		$this->hasMany('customerCareApp/Ticket','staff_id');
		$this->hasMany('customerCareApp/Project','staff_id');

		// $this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function tryLogin($email,$password){

		$staff=$this->add('customerCareApp/Model_Staff');

		$staff->addCondition('email',$email); 
		$staff->addCondition('password',$password);
		$staff->tryLoadAny();

		if($staff->loaded()){
			$this->api->memorize('logged_in_user',$email);
			$this->api->memorize('type_of_user','staff');
			return true;
		}
		else{
			$this->api->forget('logged_in_user',$email);
			$this->api->forget('type_of_user','staff');
			return false;
		}
	}


	// function beforeSave(){
	// 	$old_staff=$this->add('customerCareApp/Model_Staff');
	// 	if($this->loaded())
	// 		$old_staff->addCondition('id','<>',$this->id);
	// 	$old_staff->addCondition('name',$this['name']);
	// 	$old_staff->tryLoadAny();
	// 	if($old_staff->loaded())
	// 		throw $this->exception("Already Exists!!");
	// }
}