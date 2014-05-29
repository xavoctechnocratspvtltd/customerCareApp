<?php

namespace customerCareApp;

class View_Server_CustomerOpenTicket extends \View{
	function init(){
		parent::init();


		$form=$this->add('Form');

		$model=$this->add('customerCareApp/Model_Project');
		$model->addCondition('customer_id',$this->api->xcustomercareauth->model['id']);
		$project=$form->addField('DropDown','project');	
		$project->setModel($model);

		$form->addField('line','subject')->validateNotNull();
		$form->addField('text','detail')->validateNotNull();
		$form->addSubmit('Submit');	

		if($form->isSubmitted()){
			
			$model=$this->add('customerCareApp/Model_Ticket');
			
			$model['customer_id']=$this->api->xcustomercareauth->model['id'];	
			$model['project_id']=$form['project'];
			$model['subject']=$form['subject'];
			$model['detail']=$form['detail'];
			$model['ticketstatus_id']=5;

			$model->save();		
			// $form->update(
			$this->js()->univ()->redirect($this->api->url(null,array('subpage'=>'xcustomercare-customerticketstatus')))->execute();
			// $this->js()->univ()->successMessage('Ticket Submitted')->execute();
			// $form->js()->reload()->execute();
		}

	}
}