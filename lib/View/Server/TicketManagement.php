<?php

namespace customerCareApp;

class View_Server_TicketManagement extends \View{
	function init(){
		parent::init();

		$add_btn=$this->add('Button')->set('Create New Ticket')->setStyle('margin:1% 0 1% 1%;');
		$add_btn->js('click')->univ()->frameURL('New Ticket',$this->api->url('customerCareApp_page_editticket'));
		$grid=$this->add('Grid');

		if($_GET['edit']){
			
		$this->js()->univ()->frameURL('Edit Ticket',$this->api->url('customerCareApp_page_editticket',array('ticket_id'=>$_GET['edit'])))->execute();
		
		}
		if($_GET['comments']){
			$ticket=$this->add('customerCareApp/Model_Ticket');
			$ticket->load($_GET['comments']);
			//TO-DO pass ticket no of current record
			$this->js()->univ()->frameURL('Ticket:'.$ticket['name'],$this->api->url('customerCareApp_page_ticketstatus',array('ticket_id'=>$_GET['comments'])))->execute();
		}

		if($_GET['delete']){
			$ticket=$this->add('customerCareApp/Model_Ticket');
			$ticket->load($_GET['delete']);
			$ticket->delete();
			$grid->js()->reload()->execute();
		}
		$grid->addClass('ticketclass');
		$grid->js('reload')->reload();
		$grid->setModel($this->api->xcustomercareauth->model->ref('customerCareApp/Ticket'),array('name','subject','project','customer','ticketpriority','ticketstatus'));		
		$grid->addColumn('button','comments');
		$grid->addColumn('button','edit');
		$grid->addColumn('button','delete');
	}
}