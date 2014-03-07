<?php

namespace customerCareApp;

class Model_Company extends \Model_Table { 
	var $table= "customerCareApp_company";
	function init(){
		parent::init();

		$this->hasOne('Epan','epan_id');
		$this->hasOne('customerCareApp/Config','config_id');

		$this->addField('name');
		$this->addField('company_address');
		

		$this->hasMany('customerCareApp/Department','company_id');
		$this->hasMany('customerCareApp/User','company_id');
		$this->hasMany('customerCareApp/Issue','company_id');
		$this->hasMany('customerCareApp/EmailTemplate','company_id');

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