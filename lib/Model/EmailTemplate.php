<?php

namespace customerCareApp;

class Model_EmailTemplate extends \Model_Table {
	var $table= "customerCareApp_emailTemplate";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Company','customerCareApp_company_id');

		$this->addField('name');

		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){
		/*$emailtemplate=$this->add('customerCareApp/Model_Emailtemplate');
		$this->loaded();
		if($emailtemplate->loaded()){
		$emailtemplate->addCondition('id','<>',$this->id);
		}
		$emailtemplate->addCondition('name',$this['name']);
		$emailtemplate->tryLoadAny();
		throw $this->exception('it is exist');
		*/function beforeSave(){
		$old_emailTemplate=$this->add('customerCareApp/Model_Emailtemplate');
		if($this->loaded())
			$old_emailtemplate->addCondition('id','<>',$this->id);
		$old_emailtemplate->addCondition('name',$this['name']);
		$old_emailtemplate->tryLoadAny();
		if($old_emailtemplate->loaded())
			throw $this->exception("Already Exists!!");
		

		
	}
	function beforeDelete(){
		
	}

}