<?php

namespace customerCareApp;

class Model_Comment extends \Model_Table {
	var $table= "customerCareApp_comment";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Ticket','ticket_id');

		$this->addField('comment')->type('text');
		$this->addField('comment_by');
		$this->addField('comment_at')->type('date')->defaultValue(date('Y-m-d hh:mm:ss'));
		$this->addField('user_type');



		$this->add('dynamic_model/Controller_AutoCreator');
	}
}