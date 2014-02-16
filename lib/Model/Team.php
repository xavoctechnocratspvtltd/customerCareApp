<?php

namespace customerCareApp;

class Model_Team extends \Model_Table {
	var $table= "customerCareApp_team";
	function init(){
		parent::init();


		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}