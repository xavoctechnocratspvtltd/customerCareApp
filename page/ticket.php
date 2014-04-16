<?php
class page_customerCareApp_page_ticket extends Page{
	function init(){
		parent::init();

		$this->api->stickyGET('ticket_id');



		$form=$this->add('Form');
		$model=$this->add('customerCareApp/Model_Ticket');
		$model->addCondition('staff_id',$this->api->xcustomercareauth->model->id);
		if($_GET['ticket_id'])
			$model->load($_GET['ticket_id']);
		$form->setModel($model);

		if($form->isSubmitted()){
			$form->update();
			$form->js(null,$this->js()->_selector('.ticketclass')->trigger('reload'))->univ()->closeDialog()->execute();
		}
		
	}
}
