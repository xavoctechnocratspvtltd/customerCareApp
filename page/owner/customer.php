<?php
	class page_customerCareApp_page_owner_customer extends page_customerCareApp_page_owner_main{
			function init(){
				parent::init();
					$user_crud = $this->add('CRUD');
					$user_crud->setModel('customerCareApp/Customer');
			}
	}