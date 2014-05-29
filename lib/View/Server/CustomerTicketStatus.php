<?php

namespace customerCareApp;

class View_Server_CustomerTicketStatus extends \View{
	function init(){
		parent::init();
		
		if($_GET['comments']){
			$ticket=$this->add('customerCareApp/Model_Ticket');
			$ticket->load($_GET['comments']);
			$this->js()->univ()->frameURL('Ticket:'.$ticket['name'],$this->api->url('customerCareApp_page_ticketstatus',array('ticket_id'=>$_GET['comments'])))->execute();
		
		}

		$grid=$this->add('Grid');
		$ticket=$this->add('customerCareApp/Model_Ticket');
		$ticket->addCondition('customer_id',$this->api->xcustomercareauth->model->id);
		$grid->setModel($ticket,array('ticket_id','project','subject','detail','ticketstatus'));
		$grid->addColumn('button','comments');
	}

}