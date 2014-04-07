<?php

namespace customerCareApp;

class Model_Config extends \Model_Table { 
	var $table= "customerCareApp_config";
	function init(){
		parent::init();
<<<<<<< HEAD

		$this->hasOne('customerCareApp/Ticket_Priority','ticket_priority_id')->caption('Default Priority');
		$this->hasOne('customerCareApp/Ticket_Status','ticket_status_id')->caption('Default Priority');
=======
		
		$this->hasOne('customerCareApp/TicketPriority','ticketpriority_id')->caption('Default Priority');
		$this->hasOne('customerCareApp/TicketStatus','ticketstatus_id')->caption('Default Priority');
		$this->hasOne('customerCareApp/TicketType','tickettype_id')->caption('Default Type');
>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c
		$this->hasOne('Epan','epan_id');
		

		$this->addField('helpDeskName')->caption('Help Desk Name');   
		$this->addField('helpDeskUrl')->caption('Help Desk URL');   
<<<<<<< HEAD
		$this->addField('updated')->type('dateTime')->defaultValue(date('Y-m-d H:i:s'));   
		// $this->addField('updated')->type('dateTime');   
=======
		$this->addField('updated')->type('dateTime')->defaultValue(date('Y-m-d hh:mm:ss'));   

>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		
	}

<<<<<<< HEAD
	function beforeSave(){
		$old_config=$this->add('customerCareApp/Model_Config');
		if($this->loaded())
			$old_config->addCondition('id','<>',$this->id);
		// $old_config->addCondition('name',$this['name']);
		$old_config->tryLoadAny();
		if($old_config->loaded())
			throw $this->exception("Already Exists!!");
		
		
=======
	function beforeSave(){		//one epan can have one config
		// $old_config=$this->add('customerCareApp/Model_Config');
		// if($this->loaded())
		// 	$old_config->addCondition('id','<>',$this->id);
		// $old_config->addCondition('name',$this['name']);
		// $old_config->tryLoadAny();
		// if($old_config->loaded())
		// 	throw $this->exception("Already Exists!!");
>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c
	}
}