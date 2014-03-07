<?php
	class page_customerCareApp_page_owner_user extends page_customerCareApp_page_owner_main{
			function init(){
				parent::init();
						$user_crud = $this->add('CRUD');
		$user_crud->setModel('customerCareApp/User');
			}
	}