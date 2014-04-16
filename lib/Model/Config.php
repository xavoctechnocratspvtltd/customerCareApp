<?php

namespace customerCareApp;

class Model_Config extends \Model_Table { 
	var $table= "customerCareApp_config";
	function init(){
		parent::init();

		// throw new \Exception("Error Processing Request", 1);
		

		// $this->hasOne('Epan','epan_id');
		
		$this->addField('helpDeskName')->caption('Help Desk Name');   
		$this->addField('helpDeskUrl')->caption('Help Desk URL');   
		$this->addField('company_name');
		$this->addField('company_email');
		$this->addField('phone_no');
		$this->addField('owner_name');
		$this->addField('owner_email');
		$this->addField('owner_phone_no');
		$this->addField('address');
		$this->add('filestore/Field_Image','logo_id');
		$this->addField('updated')->type('dateTime')->defaultValue(date('Y-m-d hh:mm:ss'));   

		// $this->hasMany('customerCareApp/Customer','config_id');
		// $this->hasMany('customerCareApp/Department','config_id');
		// $this->hasMany('customerCareApp/EmailTemplate','config_id');
		// $this->hasMany('customerCareApp/Staff','config_id');
		// $this->hasMany('customerCareApp/Ticket','config_id');
		// $this->hasMany('customerCareApp/TicketPriority','config_id');
		// $this->hasMany('customerCareApp/TicketStatus','config_id');
		// $this->hasMany('customerCareApp/TicketType','config_id');

		// $this->addHook('beforeDelete',$this);
		// $this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	// function beforeDelete(){
		
	// }

	// function beforeSave(){		//one epan can have one config
	// 	// $old_config=$this->add('customerCareApp/Model_Config');
	// 	// if($this->loaded())
	// 	// 	$old_config->addCondition('id','<>',$this->id);
	// 	// $old_config->addCondition('name',$this['name']);
	// 	// $old_config->tryLoadAny();
	// 	// if($old_config->loaded())
	// 	// 	throw $this->exception("Already Exists!!");
	// }
}