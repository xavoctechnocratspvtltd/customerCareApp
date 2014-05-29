<?php

namespace customerCareApp;

class View_Server_Faq extends \View{
	function init(){
		parent::init();
	
		// $grid=$this->add('Grid');
		$model=$this->add('customerCareApp/Model_Faq');
		// $grid->setModel($model);
		foreach ($model as $value) {
			$this->add('H4')->set('Q : '.$model['question']);
			$this->add('H4')->set('Ans : ');
			$this->add('H5')->set($model['answare'])->setStyle('margin-bottom: 5%; padding-bottom: 2%; border-bottom-width: 2px; border-bottom-style: dashed;');
		}

	}
}