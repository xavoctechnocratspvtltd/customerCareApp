<?php

class page_customerCareApp_page_owner_config extends page_customerCareApp_page_owner_main{
	function init(){
		parent::init();
<<<<<<< HEAD

		$model=$this->add('customerCareApp/Model_Config');
		
=======
		// $crud=$this->add('CRUD');
		// $crud->setModel('customerCareApp/Config');

		$model=$this->add('customerCareApp/Model_Config');

>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c
		$model_loaded=$this->add('customerCareApp/Model_Config');
		$model_loaded->addCondition('epan_id',$this->api->current_website->id);
		$model_loaded->tryLoadAny();
		
		$form=$this->add('Form');
<<<<<<< HEAD
		if($model_loaded){
			$form->setModel($model_loaded);
		}else{
=======
		if($model_loaded){   //if record found show data from database
			$form->setModel($model_loaded);
		}else{			//if record not found show blank form
>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c
			$form->setModel($model);
		}
		$form->addSubmit('Submit');		
	
		if($form->isSubmitted()){
			$form->update();
			$form->js()->reload()->execute();
		}
<<<<<<< HEAD
=======

>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c
	}
}
