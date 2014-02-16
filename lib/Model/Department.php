<?php

namespace customerCareApp;

class Model_Department extends \Model_Table {
	var $table= "customerCareApp_department";
	function init(){
		parent::init();

		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}