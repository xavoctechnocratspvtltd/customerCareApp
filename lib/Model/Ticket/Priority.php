<?php

namespace customerCareApp;

class Model_Ticket_Priority extends \Model_Table { 
	var $table= "customerCareApp_ticket_priority";
	function init(){
		parent::init();
		$this->addField('name');
		$this->addField('color');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}
	function beforeDelete(){

	}

	function beforeSave(){
		$old_priority=$this->add('customerCareApp/Model_Ticket_Priority');
		if($this->loaded())
			$old_priority->addCondition('id','<>',$this->id);
		$old_priority->addCondition('name',$this['name']);
		$old_priority->tryLoadAny();
		if($old_priority->loaded())
			throw $this->exception("Already Exists!!");
		
		
	}
}
