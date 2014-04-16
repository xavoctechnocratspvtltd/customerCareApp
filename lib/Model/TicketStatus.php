<?php

namespace customerCareApp;

class Model_TicketStatus extends \Model_Table { 
	var $table= "customerCareApp_ticketstatus";
	function init(){
		parent::init();

		// $this->hasOne('customerCareApp/Config','config_id');

		$this->addField('name');
		$this->hasMany('customerCareApp/Ticket','ticketstatus_id');

		// $this->addHook('beforeDelete',$this);
		// $this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}
	// function beforeDelete(){
	// // 	if($this->ref('customerCareApp/Status')->count()->getOne()>0)
	// // 		throw $this->exception('You can not delete this.It has a status...');

	// }

	// function beforeSave(){
	// 	$old_status=$this->add('customerCareApp/Model_TicketStatus');
	// 	if($this->loaded())
	// 		$old_status->addCondition('id','<>',$this->id);
	// 	$old_status->addCondition('name',$this['name']);
	// 	$old_status->tryLoadAny();
	// 	if($old_status->loaded())
	// 		throw $this->exception("Already Exists!!");
	// }
}
