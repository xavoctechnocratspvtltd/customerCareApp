<?php

class page_customerCareApp_page_owner_config extends page_componentBase_page_owner_main{
	function init(){
		parent::init();

		$this->add('H3')->set('Configuration');
		$form=$this->add('Form');
		$form->setModel('customerCareApp/Config');
		$form->addSubmit('Update');
	}
}