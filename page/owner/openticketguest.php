<?php
class customerCareApp_page_owner_guest extends customerCareApp_Page_owner_guest{
	function init(){
		parent::init();
		$button=$this->add('button')->set('open ticket');
		$button=$this->add('button')->set('view status');
		$this->add('h3')->set('before opening new ticket first visit faqs please fill the form below and provide as much information as possible ');
		$this->addField('dropdownist')->issueList('');
		$form=$this->add('Form');
		$this->addField('emailaddress');
		$this->addField('fullname');
		$this->addField('phonenumber');
		$this->addField('issuesummary');
		$button=$this->add('button');
		$button->add('submit');
		$button=$this->add('reset');
		$button=$this->add('cacel');





		
	}
}