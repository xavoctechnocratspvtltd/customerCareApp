<?php

namespace customerCareApp;

class View_TicketStatus extends \View{
	function init(){
		parent::init();
	}

	// function setModel($model){
	// 	$v=$this->add('customerCareApp/View_Comment',null,'comment');
	// 	$v->setModel($model->ref('customerCareApp/Comment'));
		
	// 	parent::setModel($model);		
	// }

	function defaultTemplate(){
		$l=$this->api->locate('addons',__NAMESPACE__, 'location');
		$this->api->pathfinder->addLocation(
			$this->api->locate('addons',__NAMESPACE__),
			array(
		  		'template'=>'templates',
		  		'css'=>'templates/css',
		  		'js'=>'templates/js'
				)
			)->setParent($l);

		return array('view/customerCareApp-ticketstatus');
	}
}