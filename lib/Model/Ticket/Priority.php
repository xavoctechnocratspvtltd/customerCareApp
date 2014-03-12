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
		$status=$this->add('customerCareApp/Model_Priority');
		$this->loaded();
		if($status->loaded()){
		$status->addCondition('id','<>',$this->id);
		}
		$status->addCondition('name',$this['name']);
		$status->tryLoadAny();
		throw $this->exception('it is exist');
		
		
	}
}