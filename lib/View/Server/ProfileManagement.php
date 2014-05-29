<?php

namespace customerCareApp;

class View_Server_ProfileManagement extends \View{
	function init(){
		parent::init();

	
		$this->add('H1')->set($this->api->xcustomercareauth->model['name']);
		$form=$this->add('Form');
		$form->setModel($this->api->xcustomercareauth->model,array('phone_number','address','password'));
		//TODO : add repassword 
		$form->addField('password','repassword');
		$form->addSubmit('Submit');		
	
		if($form->isSubmitted()){
			if($form['password']==$form['repassword']){
				$form->update();
				$form->js()->reload()->execute();
			}else{
				$this->js()->univ()->errorMessage('Password does not match!!')->execute();	
			}
		}		
	}
}