<?php

namespace customerCareApp;

class Model_Project extends \Model_Table { 
	var $table= "customerCareApp_project";
	function init(){
		parent::init();

			$this->hasOne('customerCareApp/Customer','customer_id');
			$this->hasOne('customerCareApp/Staff','staff_id');
			$this->addField('name')->caption('Project Name');
			$this->addField('description')->type('text');
			$this->addField('created_at')->type('date')->defaultValue(date('Y-m-d'));
			$this->addField('price')->type('money');
			$this->addField('is_active')->type('boolean');
			$this->addField('status')->enum(array('Pending','Running','Completed'));
			$this->hasMany('customerCareApp/Ticket','project_id');

			$this->add('dynamic_model/Controller_AutoCreator');
}
}