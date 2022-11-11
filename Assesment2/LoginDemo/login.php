<?php
include 'lib/abstractView.php';
class LoginView extends AbstractView {

	private $form;
	public function __construct() {
		$this->form=file_get_contents('html/forms/login.html');
	}
		
	public function updateForm($name,$value) {
		$key='{{'.$name.'}}';
		$this->form=str_replace($key, $value,$this->form);
	}
	
	public function prepare () {	
		$this->setTemplateField('content',$this->form);
	}
	
}
?>