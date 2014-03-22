<?php
class page_customerCareApp_page_owner_guestComplain extends customerCareApp_Page_owner_main{
	function init(){
		parent::init();
		$this->add('h3')->set('Welcome to Support center');
		$this->add('h2')->set('for every request a unique ticket id is provided,which can be used to track the progress and status online.avalid email id is requirednt to submit a ticket');
// 	//    $button=$this->add('Button');
// 	// $button->set('open ticket');
// 	//     $button=$this->add('button');
// 	//     $button->set('check status');
// }
}