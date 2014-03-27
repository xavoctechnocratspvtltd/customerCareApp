<?php

namespace customerCareApp;

class Model_Config extends \Model_Table { 
	var $table= "customerCareApp_config";
	function init(){
		parent::init();

<<<<<<< HEAD
<<<<<<< HEAD
		// $this->hasOne('customerCareApp/Company','company_id')->caption('Company');
		$this->hasOne('customerCareApp/Ticket_Priority','ticket_priority_id')->caption('Default Priority');
		$this->hasOne('customerCareApp/Ticket_Status','ticket_status_id')->caption('Default Priority');
=======
		$this->hasOne('customerCareApp/Ticket_Priority','ticket_priority_id')->caption('Default Priority');
		$this->hasOne('customerCareApp/Ticket_Status','ticket_status_id')->caption('Default Priority');
		$this->hasOne('Epan','epan_id');
>>>>>>> 54a22c44b5a08afa82fafeb7f646f4cbca08f6e0
=======
		$this->hasOne('customerCareApp/Ticket_Priority','ticket_priority_id')->caption('Default Priority');
		$this->hasOne('customerCareApp/Ticket_Status','ticket_status_id')->caption('Default Priority');
		$this->hasOne('Epan','epan_id');
>>>>>>> 8d0084677c3144c8393b7d30bc4ec74d70c15f74
		

		$this->addField('helpDeskName')->caption('Help Desk Name');   
		$this->addField('helpDeskUrl')->caption('Help Desk URL');   
		//$this->addField('updated')->type('dateTime')->defaultValue(date('Y-m-d').time('hh:mm:ss'));   
		$this->addField('updated')->type('dateTime');   


		// $this->addHook('beforeDelete',$this);
		// $this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	// function beforeDelete(){
		

	// }

	// function beforeSave(){
	// 	$config=$this->add('customerCareApp/Model_Config');
	// 	$this->loaded();
	// 	if($config->loaded()){
	// 	$config->addCondition('id','<>',$this->id);
	// 	}
	// 	$config->addCondition('name',$this['name']);
	// 	$config->tryLoadAny();
	// 	throw $this->exception('it is exist');

	function beforeSave(){
		$old_config=$this->add('customerCareApp/Model_Config');
		if($this->loaded())
			$old_config->addCondition('id','<>',$this->id);
		$old_config->addCondition('name',$this['name']);
		$old_config->tryLoadAny();
		if($old_config->loaded())
			throw $this->exception("Already Exists!!");
		

		
		
	// }
}