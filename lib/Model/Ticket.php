<?php

namespace customerCareApp;

class Model_Ticket extends \Model_Table {
	var $table= "customerCareApp_ticket";
	function init(){
		parent::init();
		$this->hasOne('customerCareApp/Customer','customer_id');
		$this->hasOne('customerCareApp/Department','department_id');
<<<<<<< HEAD
		$this->hasOne('customerCareApp/User','user_id');
		$this->hasOne('customerCareApp/TicketType','ticketType_id');
		$this->hasOne('customerCareApp/Ticket_Priority','ticket_priority_id');
=======
		$this->hasOne('customerCareApp/TicketType','tickettype_id');
		$this->hasOne('customerCareApp/TicketStatus','ticketstatus_id');
		$this->hasOne('customerCareApp/TicketPriority','ticketpriority_id');
>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c

		$this->addField('name');
		$this->addField('subject');
		$this->addField('detail')->type('text');

		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){
		$old_Ticket=$this->add('customerCareApp/Model_Ticket');
		if($this->loaded())
			$old_Ticket->addCondition('id','<>',$this->id);
		$old_ticket->addCondition('name',$this['name']);
		$old_Ticket->tryLoadAny();
		if($old_Ticket->loaded())
			throw $this->exception("Already Exists!!");
	}
}