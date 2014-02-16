<?php

namespace customerCareApp;

class Model_Issue extends \Model_Table {
	var $table= "customerCareApp_issue";
	function init(){
		parent::init();



		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}