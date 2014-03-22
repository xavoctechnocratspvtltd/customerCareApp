<?php

class page_customerCareApp_page_owner_sysConfig extends page_customerCareApp_page_owner_main{
	function init(){
		parent::init();
		$model=$this->add('customerCareApp/Model_Config');
		$model->addCondition('epan_id',$this->api->current_website->id);
		$model->loadAny();
		$form=$this->add('Form');
		$form->setModel($model);
		$form->addSubmit('Update');
	}
}