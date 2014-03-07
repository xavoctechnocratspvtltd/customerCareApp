<?php

class page_customerCareApp_page_owner_config extends page_customerCareApp_page_owner_main{
	function init(){
		parent::init();
		$crud=$this->add('CRUD');
		$crud->setModel('customerCareApp/Config');

		// $this->add('H3')->set('Configuration');
		// $url=$this->add('customerCareApp/Model_Config');
		// $url->addCondition('name','=','URL');
		// $url->tryLoadAny();
		// $helpDeskName=$this->add('customerCareApp/Model_Config');
		// $helpDeskName->addCondition('name','=','HelpDeskName');
		// $helpDeskName->tryLoadAny();
		// $company=$this->add('customerCareApp/Model_Config');
		// $company->addCondition('name','=','Company');
		// $company->tryLoadAny();

		// $form=$this->add('Form');
		// $form->addField('line','URL')->set($url['value']);
		// $form->addField('line','Company')->set($url['value']);
		// $form->addField('line','help_desk_name')->set($helpDeskName['value']);
		//$form->addSubmit('Update');
		// $form=$this->add('Form');
		// $form->setModel('customerCareApp/Config');
		// $form->addSubmit('Update');


		// if($form->isSubmitted()){
		// 	$config_url_up=$this->add('customerCareApp/Model_Config');
		// 	$config_url_up->addCondition('name','=','URL');
		// 	$config_url_up->tryLoadAny();
		// 	$config_url_up['value']=$form->get('URL');
		// 	$config_url_up['update']=date('Y-m-d');
		// 	$config_url_up->save();
		// }
	}
}