<?php

namespace customerCareApp;

class View_Server_CustomerLogin extends \View{
	function init(){
		parent::init();

		$this->add('H1')->set('Customer Login')->setAttr('align','center');
		$form=$this->add('Form');
		$form->addField('line','email')->validateNotNull('Required Field');
		$form->addField('password','password')->validateNotNull('Required Field');

		// $form->addSubmit('login');
		$form->add('Button')->set('Login')
		->addStyle(array('margin-top'=>'25px','margin-left'=>'37px'))
			->js('click')->submit();
		
		

		if($form->isSubmitted()){
		
			$staff=$this->add('customerCareApp/Model_Customer');
				
		 	if(!$staff->tryLogin($form['email'],$form['password']))
		 		$form->displayError('email','Wrong input');
		 	
				// Redirect to Dashboard
			$this->js()->univ()->redirect($this->api->url(null,array('subpage'=>'xcustomercare-customerdashboard')))->execute();
		}
	}
}