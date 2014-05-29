<?php
class page_customerCareApp_page_ticketstatus extends Page{
	function init(){
		parent::init();

		$this->api->stickyGET('ticket_id');
		
		$ticketstatus_view=$this->add('customerCareApp/View_TicketStatus');
		$ticketstatus_model=$this->add('customerCareApp/Model_Ticket');
		$ticketstatus_model->load($_GET['ticket_id']);
		$ticketstatus_view->setModel($ticketstatus_model);

			$comment=$ticketstatus_model->ref('customerCareApp/Comment');
			$v=$this->add('customerCareApp/View_Comment');
			// $v->template->trySet('comment',$comment['name']);
			$v->setModel($comment);
			$f=$v->add('Form',null,'form');
			$f->addField('line','comment');
			$f->addSubmit('Comment');
			if($f->isSubmitted()){
				$model=$this->add('customerCareApp/Model_Comment');
			
				// $model['comment_by']=$this->api->xcustomercareauth->model->id;	
				$model['ticket_id']=$_GET['ticket_id'];
				$model['comment']=$f['comment'];
				$model['comment_by']=$this->api->xcustomercareauth->model['name'];
				$model['comment_at']=date('Y-m-d hh:mm:ss');
				$model['user_type']=$this->api->recall('type_of_user');
				

				$model->save();
				$this->js()->reload()->execute();		
				


			}
		// $ticketstatus_view->template->trySet('ticket_id',$ticketstatus_model->ref('ticket_id')->get('name'));
	}
}
