<?php
/*
   A PHP framework for web sites
   
   Sample CRUD controller for a single person
   ==========================================

   
   new
   edit
   delete
   view
   
*/

include 'models/person.php';
include 'views/person.php';

class PersonController extends AbstractController {

	public function __construct($context) {
		parent::__construct($context);
	}

	protected function getView($isPostback) {
		$db=$this->getDB();
		$uri=$this->getURI();
		$action=$uri->getPart();
		switch ($action) {
			case 'new':
				return handleEdit($postback,null);
			case 'edit':
				$id=$uri->getID();
				return handleEdit($postback,$id);	
			case 'view':
				break;
			case 'delete':
				break;
			default:
				throw new InvalidRequestException ("Invalid action in URI");
		}
	
/*
		$model = new PeopleModel($db);
		$view=new PeopleView();
		$view->setModel($model);
		$view->setTemplate('html/masterPage.html');
		return $view;
*/	
	}
	
	private function handleEdit($postback, $id=null) {
	}
	
	private function handleView($postback, $id=null) {
				throw new Exception ("Not yet implemented");
	}
	
}
?>