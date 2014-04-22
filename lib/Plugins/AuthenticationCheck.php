<?php

namespace customerCareApp;

class Plugins_AuthenticationCheck extends \componentBase\Plugin{
	public $namespace = 'customerCareApp';

	function init(){
		parent::init();
		
		$this->addHook('website-page-loaded',array($this,'AuthenticatePage'));
	}

	function AuthenticatePage($obj,&$page){
		// throw new \Exception("Error Processing Request", 1);
		

		$subpage = $_GET['subpage'];
		// throw new \Exception($_GET['cairo_ps_surface_dsc_begin_page_setup(surface)e'], 1);
		

		// ONLY WORKS FOR PAGES CONTAINS "xsocial-" IN PAGE
		// DO NOT CHECK FOR xsocial-login PAGE

		$allowed_page=array('xcustomercare-stafflogin','xcustomercare-customerlogin');

		if(strpos($subpage,	'xcustomercare-') === 0 AND !in_array($subpage, $allowed_page)){
			$allowed_page = array(
					'staff'=>array(),
					'customer'=>array(),
				);

			$login_page=array(
					'staff'=>'xcustomercare-stafflogin',
					'customer'=>'xcustomercare-customerlogin',
				);

			$model=array(
					'staff'=>'Staff',
					'customer'=>'Customer',
				);
			
			// IF session has logged_in_user value meanse user is there
			// load auth in api->xsocialauth and login this user
			$logged_in_user = $this->api->recall('logged_in_user',false);
			$type_of_user = $this->api->recall('type_of_user',false);
			
			if(!$logged_in_user){
				if(in_array($subpage, $allowed_page['staff'])){
					$this->api->redirect($this->api->url(null,array('subpage'=>$login_page['staff'])));
				}
				if(in_array($subpage, $allowed_page['customer'])){
					$this->api->redirect($this->api->url(null,array('subpage'=>$login_page['customer'])));
				}
				
				$this->api->redirect($this->api->url(null,array('subpage'=>'home')));
			}
			
			// if(!in_array($subpage, $allowed_page[$type_of_user])){				
			// 	$this->api->redirect($this->api->url(null,array('subpage'=>$login_page[$type_of_user])));
			// }

			$xcustomercareauth =$this->add('BasicAuth',array('is_default_auth'=>false));
			$xcustomercareauth->setModel('customerCareApp/Staff','email','password');
			$this->api->xcustomercareauth = $xcustomercareauth;
				
			// TODO :: Set cu_id = null when logout

			$xcustomercareauth->login($logged_in_user);

		}
	}

	function getDefaultParams($new_epan){  
		//$this->addFOrm()
		//$this->addFOrm()

	}
}