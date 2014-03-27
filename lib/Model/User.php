<?php

namespace customerCareApp;

class Model_User extends \Model_Table {
	var $table= "customerCareApp_user";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Company','customerCareApp_company_id');

		$this->addField('name');

		$this->hasMany('customerCareApp/Ticket','customerCareApp_user_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		if($this->ref('customerCareApp/Ticket')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has some Ticket...');
	}

	/*function beforeSave(){
		$user=$this->add('customerCareApp/Model_User');
		$this->loaded();
		if($user->loaded()){
		$user->addCondition('id','<>',$this->id);
		}
		$user->addCondition('name',$this['name']);
		$user->tryLoadAny();
		throw $this->exception('it is exist');
		*/
		function beforeSave(){
		$old_user=$this->add('customerCareApp/Model_User');
		if($this->loaded())
			$old_user->addCondition('id','<>',$this->id);
		$old_user->addCondition('name',$this['name']);
		$old_user->tryLoadAny();
		if($old_user->loaded())
			throw $this->exception("Already Exists!!");
		

	}
}