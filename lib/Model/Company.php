<?php

namespace customerCareApp;

class Model_Company extends \Model_Table {
	var $table= "customerCareApp_company";
	function init(){
		parent::init();

		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}