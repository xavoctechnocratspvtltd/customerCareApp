<?php

namespace customerCareApp;

class Model_EmailTemplate extends \Model_Table {
	var $table= "customerCareApp_emailTemplate";
	function init(){
		parent::init();

		$this->hasOne('Epan','epan_id');
		
		$this->addField('name');
		$this->addField('subject');
<<<<<<< HEAD
		$this->addField('body');
=======
		$this->addField('msgbody')->type('text');
>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c

		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

<<<<<<< HEAD
	function beforeSave(){
		$old_emailTemplate=$this->add('customerCareApp/EmailTemplate');
		if($this->loaded())
			$old_emailTemplate->addCondition('id','<>',$this->id);
		$old_emailTemplate->addCondition('name',$this['name']);
		$old_emailTemplate->tryLoadAny();
		if($old_emailTemplate->loaded())
			throw $this->exception("Already Exists!!");
	}
=======
>>>>>>> 32a2004c577b7781786d07d3c0e2b57e3cb9ce0c
	function beforeDelete(){
		
	}

	function beforeSave(){
		$old_emailTemplate=$this->add('customerCareApp/Model_Emailtemplate');
		if($this->loaded())
			$old_emailtemplate->addCondition('id','<>',$this->id);
		$old_emailtemplate->addCondition('name',$this['name']);
		$old_emailtemplate->tryLoadAny();
		if($old_emailtemplate->loaded())
			throw $this->exception("Already Exists!!");
	}

}