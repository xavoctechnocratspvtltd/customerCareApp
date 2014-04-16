<?php

namespace customerCareApp;

class View_Server_StaffProfile extends \View{
	function init(){
		parent::init();

	
		$this->add('H1')->set($this->api->xcustomercareauth->model['name']);
		$form=$this->add('Form');
		$form->setModel($this->api->xcustomercareauth->model,array('phone_number','address','password'));
		$form->addSubmit('Submit');		
	
		if($form->isSubmitted()){
			$form->update();
			$form->js()->reload()->execute();
		}		
	}
}