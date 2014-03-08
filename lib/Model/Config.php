<?php

namespace customerCareApp;

class Model_Config extends \Model_Table { 
	var $table= "customerCareApp_config";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Company','company_id')->caption('Company');
		$this->hasOne('customerCareApp/Ticket_Priority','ticket_priority_id')->caption('Default Priority');
		$this->hasOne('customerCareApp/Ticket_Priority','ticket_status_id')->caption('Default Priority');
		

		$this->addField('helpDeskName')->caption('Help Desk Name');   
		$this->addField('helpDeskUrl')->caption('Help Desk URL');   
		//$this->addField('updated')->type('dateTime')->defaultValue(date('Y-m-d').time('hh:mm:ss'));   
		$this->addField('updated')->type('dateTime');   


		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		

	}

	function beforeSave(){
		
	}
}