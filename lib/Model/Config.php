<?php

namespace customerCareApp;

class Model_Config extends \Model_Table { 
	var $table= "customerCareApp_config";
	function init(){
		parent::init();
		$this->hasOne('customerCareApp/TicketPriority','ticketpriority_id')->caption('Default Priority');
		$this->hasOne('customerCareApp/TicketStatus','ticketstatus_id')->caption('Default Status');
		$this->hasOne('customerCareApp/TicketType','tickettype_id')->caption('Default Type');

		$this->hasOne('Epan','epan_id');
		
		$this->addField('helpDeskName')->caption('Help Desk Name');   
		$this->addField('helpDeskUrl')->caption('Help Desk URL');   

		$this->addField('updated')->type('dateTime')->defaultValue(date('Y-m-d hh:mm:ss'));   


		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		
	}

	function beforeSave(){		//one epan can have one config
		// $old_config=$this->add('customerCareApp/Model_Config');
		// if($this->loaded())
		// 	$old_config->addCondition('id','<>',$this->id);
		// $old_config->addCondition('name',$this['name']);
		// $old_config->tryLoadAny();
		// if($old_config->loaded())
		// 	throw $this->exception("Already Exists!!");
	}
}