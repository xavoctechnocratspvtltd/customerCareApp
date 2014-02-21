<?php

class page_customerCareApp_page_owner_config extends page_componentBase_page_owner_main{
	function init(){
		parent::init();

		$this->add('H3')->set('Configuration');
		$form=$this->add('Form');
			$config=$this->add('customerCareApp/Model_Config');

			// foreach($config as $name=>$value){
			// $config->addCondition('name','=','URL');
			// $config->tryLoadAny();
			// 	$config->add('h3')->set($value);
			// }
			$array=array();

		$form->addField('line','URL')->set($config['value']);

		$form->addSubmit('Update');

		if($form->isSubmitted()){
			$config_url_up=$this->add('customerCareApp/Model_Config');
			$config_url_up->addCondition('name','=','URL');
			$config_url_up->tryLoadAny();
			$config_url_up['value']=$form->get('URL');
			$config_url_up['update']=date('Y-m-d');
			$config_url_up->save();
		}
	}
}