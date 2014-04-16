<?php

namespace customerCareApp;

class Model_EmailTemplate extends \Model_Table {
	var $table= "customerCareApp_emailTemplate";
	function init(){
		parent::init();

		// $this->hasOne('customerCareApp/Config','config_id');
		
		$this->addField('name');
		$this->addField('subject');
		$this->addField('msgbody')->type('text');

		// $this->addHook('beforeSave',$this);
		// $this->addHook('beforeDelete',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	// function beforeDelete(){
		
	// }

	// function beforeSave(){
	// 	$old_emailTemplate=$this->add('customerCareApp/Model_Emailtemplate');
	// 	if($this->loaded())
	// 		$old_emailtemplate->addCondition('id','<>',$this->id);
	// 	$old_emailtemplate->addCondition('name',$this['name']);
	// 	$old_emailtemplate->tryLoadAny();
	// 	if($old_emailtemplate->loaded())
	// 		throw $this->exception("Already Exists!!");
	// }

}