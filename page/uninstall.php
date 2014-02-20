<?php

class page_customerCareApp_page_uninstall extends page_componentBase_page_uninstall{
	function init(){
		parent::init();

		$this->install();
	}
}