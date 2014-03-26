<?php

namespace customerCareApp;

class Model_EmailTemplate extends \Model_Table {
	var $table= "customerCareApp_emailTemplate";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Company','customerCareApp_company_id');

		$this->addField('name');
		$this->addField('subject');
		$this->addField('body');

		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){
		$old_emailTemplate=$this->add('customerCareApp/EmailTemplate');
		if($this->loaded())
			$old_emailTemplate->addCondition('id','<>',$this->id);
		$old_emailTemplate->addCondition('name',$this['name']);
		$old_emailTemplate->tryLoadAny();
		if($old_emailTemplate->loaded())
			throw $this->exception("Already Exists!!");
	}
	function beforeDelete(){
		
	}

}