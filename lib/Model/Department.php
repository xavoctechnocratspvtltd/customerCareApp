<?php

namespace customerCareApp;

class Model_Department extends \Model_Table {
	var $table= "customerCareApp_department";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Company','company_id');

		$this->addField('name');

		$this->hasMany('customerCareApp/Team','department_id');
		$this->hasMany('customerCareApp/Ticket','department_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}
	function beforeDelete(){
		if($this->ref('customerCareApp/Team')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has a Team...');
		if($this->ref('customerCareApp/Ticket')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has a Ticket...');

	}

	/*function beforeSave(){
		$company=$this->add('customerCareApp/Model_Department');
		$this->loaded();
		if($department->loaded()){
		$department->addCondition('id','<>',$this->id);
		}
		$department->addCondition('name',$this['name']);
		$department->tryLoadAny();
		throw $this->exception('it is exist')*/;
		
		function beforeSave(){
		$old_department=$this->add('customerCareApp/Model_Department');
		if($this->loaded())
			$old_department->addCondition('id','<>',$this->id);
		$old_department->addCondition('name',$this['name']);
		$old_department->tryLoadAny();
		if($old_department->loaded())
			throw $this->exception("Already Exists!!");
		

	}
}