<?php
/*
   A PHP framework for web sites
   
   Sample CRUD controller for a list of people
   ===========================================
   
*/
include 'lib/abstractController.php';
include 'models/people.php';
include 'views/people.php';

class PeopleController extends AbstractController {

	public function __construct($context) {
		parent::__construct($context);
	}

	protected function getView($isPostback) {
		$db=$this->getDB();
		$model = new PeopleModel($db);
		
		// create output
		$view=new PeopleView();
		$view->setModel($model);
		$view->setTemplate('html/masterPage.html');
		$view->setTemplateField('pagename','People');
		$view->prepare();
		return $view;
	}
}
?>