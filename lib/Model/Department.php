<?php

namespace customerCareApp;

class Model_Department extends \Model_Table {
	var $table= "customerCareApp_department";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Company','company_id');

		$this->addField('name');

		$this->hasMany('customerCareApp/Team','department_id');
		$this->hasMany('customerCareApp/Ticket','department_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}
	function beforeDelete(){
		if($this->ref('customerCareApp/Team')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has a Team...');
		if($this->ref('customerCareApp/Ticket')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has a Ticket...');

	}

	function beforeSave(){
		
	}
}