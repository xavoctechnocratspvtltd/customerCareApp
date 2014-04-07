<?php

namespace customerCareApp;

class Model_Customer extends \Model_Table {
	var $table= "customerCareApp_customer";
	function init(){
		parent::init();

		$this->addField('name');
		$this->addField('phone_number');
		$this->addField('email');
		$this->addField('address');

		$this->hasMany('customerCareApp/Ticket','customerCareApp_customer_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		
	}

	function beforeSave(){
		//make email id uniq for each epan

		$old_customer=$this->add('customerCareApp/Model_Customer');
		if($this->loaded())
			$old_customer->addCondition('id','<>',$this->id);
		$old_customer->addCondition('email',$this['email']);
		$old_customer->tryLoadAny();
		if($old_customer->loaded())
			throw $this->exception("Already Exists!!");
	}
}