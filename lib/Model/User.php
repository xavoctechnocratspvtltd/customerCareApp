<?php

namespace customerCareApp;

class Model_User extends \Model_Table {
	var $table= "customerCareApp_user";
	function init(){
		parent::init();

		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}