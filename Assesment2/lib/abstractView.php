<?php
//include 'lib/interfaces.php'; // remove later

abstract class AbstractView {
	private $model;
	private $template;
	private $fields;
	
	public function _construct() {
		$this->model=null;
		$this->template=null;
		$this->fields=array();
	}

	public function getModel() {
		return $this->model;
	}
	
	public function setModel($model) {
		$this->model=$model;
	}
	
	public function setTemplate($template) {
		$this->template=$template;
	}
	
	public function setTemplateField($name,$value){
		$this->fields[$name]=$value;
	}
	
	public function setTemplateFields($fields) {
		foreach ($fields as $name=>$value) {
			$this->setTemplateField($name, $value);
		}
	}
	
	public function render() {
		$html=file_get_contents($this->template);
		foreach ($this->fields as $name=>$value) {
			$key='##'.$name.'##';
			$html=str_replace($key, $value,$html);
		}	
		print $html;
	}
	
	//	expect subclass to override
	public function prepare () {
	}
}
?>