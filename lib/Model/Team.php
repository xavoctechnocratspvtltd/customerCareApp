<?php

namespace customerCareApp;

class Model_Team extends \Model_Table {
	var $table= "customerCareApp_team";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Department','department_id');

		$this->addField('name');

		$this->hasMany('customerCareApp/Staff','team_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		if($this->ref('customerCareApp/Staff')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has some Staff Member...');
	}

	function beforeSave(){
		$Model_Team=$this->add('customerCareApp/Model_Team');
		$this->loaded();
		if($Model_Team->loaded()){
		$Model_Team->addCondition('id','<>',$this->id);
		}
		$team->addCondition('name',$this['name']);
		$team->tryLoadAny();
		throw $this->exception('it is exist');
		
		
	}
}