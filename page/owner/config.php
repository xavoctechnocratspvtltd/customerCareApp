<?php

class page_customerCareApp_page_owner_config extends page_customerCareApp_page_owner_main{
	function init(){
		parent::init();
		$crud=$this->add('CRUD');
		$crud->setModel('customerCareApp/Config');

		// $model=$this->add('customerCareApp/Model_Config');
		// $form=$this->add('Form');
		// $form->setModel($model);
		// $form->addSubmit('Submit');
	}
}