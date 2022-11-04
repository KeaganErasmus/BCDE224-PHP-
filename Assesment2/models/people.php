<?php
include 'lib/abstractModel.php';
include 'models/person.php';

class PeopleModel extends AbstractModel {

	private $people;
	
	public function __construct($db) {
		parent::__construct($db);
		$this->people=array();
		$this->load();
	}
	
	private function load() {
		$sql="select personID, givenName, familyName from people ".
			 "order by familyName asc, givenName asc";
		$rows=$this->getDB()->query($sql);
		foreach ($rows as $row){
			$personID=$row['personID'];
			$given=$row['givenName'];
			$family=$row['familyName'];
			$person = new PersonModel($this->getDB(),$personID,$given,$family);
			$this->people[]=$person;
		}
	}
	
	public function getPeople() {
		return $this->people;
	}
}
?>