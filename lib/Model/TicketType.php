<?php
	
namespace customerCareApp;
	
class Model_TicketType extends \Model_Table {
	var $table= "customerCareApp_tickettype";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Department','department_id');
		
		$this->addField('name');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
	
		$this->add('dynamic_model/Controller_AutoCreator');
	}
	function beforeDelete(){
	// 	if($this->ref('customerCareApp/Status')->count()->getOne()>0)
	// 		throw $this->exception('You can not delete this.It has a status...');
	}
	
	function beforeSave(){
		$old_ticket_type=$this->add('customerCareApp/Model_TicketType');
		if($this->loaded())
		$old_ticket_type->addCondition('id','<>',$this->id);
		$old_ticket_type->addCondition('name',$this['name']);
		$old_ticket_type->tryLoadAny();
		if($old_ticket_type->loaded())
			throw $this->exception("Already Exists!!");
	}
}