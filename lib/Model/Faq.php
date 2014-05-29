<?php

namespace customerCareApp;

class Model_Faq extends \Model_Table { 
	var $table= "customerCareApp_faq";
	function init(){
		parent::init();

		// $this->hasOne('Epan','epan_id');
		
		$this->addField('question')->caption('Q');   
		$this->addField('answare')->type('text')->caption('Ans');   

		// $this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	// function beforeDelete(){
		
	// }

	// function beforeSave(){
	// 	// $old_config=$this->add('customerCareApp/Model_Config');
	// 	// if($this->loaded())
	// 	// 	$old_config->addCondition('id','<>',$this->id);
	// 	// $old_config->addCondition('name',$this['name']);
	// 	// $old_config->tryLoadAny();
	// 	// if($old_config->loaded())
	// 	// 	throw $this->exception("Already Exists!!");
	// }
}