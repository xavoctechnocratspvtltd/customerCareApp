<?php

class page_customerCareApp_page_owner_config extends page_customerCareApp_page_owner_main{
	function init(){
		parent::init();
		// $crud=$this->add('CRUD');
		// $crud->setModel('customerCareApp/Config');

		$model=$this->add('customerCareApp/Model_Config');

		$model->addCondition('epan_id',$this->api->current_website->id);
		$model->loadAny();
		$form=$this->add('Form');
		$form->setModel($model);
		$form->addSubmit('Submit');

		
		$model_loaded=$this->add('customerCareApp/Model_Config');
		$model_loaded->addCondition('epan_id',$this->api->current_website->id);
		$model_loaded->tryLoadAny();
		
		$form=$this->add('Form');
		if($model_loaded){   //if record found show data from database
			$form->setModel($model_loaded);
		}else{			//if record not found show blank form
			$form->setModel($model);
		}
		$form->addSubmit('Submit');		
	
		if($form->isSubmitted()){
			$form->update();
			$form->js()->reload()->execute();
		}

	}
}
