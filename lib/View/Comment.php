<?php

namespace customerCareApp;

class View_Comment extends \CompleteLister{
	function init(){
		parent::init();

		
	}

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

		return array('view/customerCareApp-comment');
	}
	
}