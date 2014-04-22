<?php

namespace customerCareApp;

class View_Server_CustomerTicketStatus extends \View{
	function init(){
		parent::init();

		$this->add('View_Info')->set('I Am Customer Ticket Status');
		$add_btn=$this->add('Button')->set('Add');
		$add_btn->js('click')->univ()->frameURL('Edit Service',$this->api->url('customerCareApp_page_ticket'));
		$grid=$this->add('Grid');

		if($_GET['edit']){
			
		$this->js()->univ()->frameURL('Edit Service',$this->api->url('customerCareApp_page_ticket',array('ticket_id'=>$_GET['edit'])))->execute();
		}

		if($_GET['delete']){
			$ticket=$this->add('customerCareApp/Model_Ticket');
			$ticket->load($_GET['delete']);
			$ticket->delete();
			$grid->js()->reload()->execute();
		}
		$grid->addClass('ticketclass');
		$grid->js('reload')->reload();
		$grid->setModel($this->api->xcustomercareauth->model->ref('customerCareApp/Ticket'));		
		$grid->addColumn('button','edit');
		$grid->addColumn('button','delete');	
	}
}