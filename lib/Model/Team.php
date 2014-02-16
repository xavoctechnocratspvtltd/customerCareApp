<?php

namespace customerCareApp;

class Model_Team extends \Model_Table {
	var $table= "customerCareApp_team";
	function init(){
		parent::init();

		$this->hasOne('customerCareApp/Department','customerCareApp_department_id');

		$this->addField('name');

		$this->hasMany('customerCareApp/Staff','customerCareApp_team_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		if($this->ref('customerCareApp/Staff')->count()->getOne()>0)
			throw $this->exception('You can not delete this.It has some Staff Member...');
	}

	function beforeSave(){
		
	}
}