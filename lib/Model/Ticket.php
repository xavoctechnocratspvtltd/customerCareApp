<?php

namespace customerCareApp;

class Model_Ticket extends \Model_Table {
	var $table= "customerCareApp_ticket";
	function init(){
		parent::init();

		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}