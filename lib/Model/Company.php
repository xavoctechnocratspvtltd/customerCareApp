<?php

namespace customerCareApp;

class Model_Company extends \Model_Table { 
	var $table= "customerCareApp_company";
	function init(){
		parent::init();


		$this->addField('name');

		$this->hasMany('customerCareApp/Department','customerCareApp_company_id');
		$this->hasMany('customerCareApp/User','customerCareApp_company_id');
		$this->hasMany('customerCareApp/Issue','customerCareApp_company_id');
		$this->hasMany('customerCareApp/EmailTemplate','customerCareApp_company_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		if($this->ref('customerCareApp/Department')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has a Department...');
		if($this->ref('customerCareApp/User')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has a User...');
		if($this->ref('customerCareApp/Issue')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has a Issue...');
		if($this->ref('customerCareApp/EmailTemplate')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has a Email Template...');

	}

	function beforeSave(){
		
	}
}