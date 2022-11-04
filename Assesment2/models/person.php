<?php

class PersonModel extends AbstractModel {

	private $id;
	private $givenName;
	private $familyName;
	private $changed;
	
	public function __construct($db, $id=null, $givenName=null, $familyName=null) {
		parent::__construct($db);
		$this->id=$id;
		$this->setGivenName($givenName);
		$this->setFamilyName($familyName);
		$this->changed=false;
	}
	
	public function getID() {
		return $this->id;
	}
	
	public function getGivenName() {
		return $this->givenName;
	}
	
	public function setGivenName($value) {
		$error=$this->errorInGivenName($value);
		if ($error!==null ){
			throw new InvalidDataException($error);
		}
		$this->givenName=$value;
		$this->changed=true;
	}
	
	public function getFamilyName() {
		return $this->familyName;
	}
	
	public function setFamilyName($value) {
		$error=$this->errorInFamilyName($value);
		if ($error!==null ){
			throw new InvalidDataException($error);
		}
		$this->familyName=$value;
		$this->changed=true;
	}
	
	public function hasChanges() {
		return $this->changed;
	}
	
	public function load($id) {
		$sql="select givenName, familyName from people ".
			 "where personID = $id";
		$rows=$this->getDB()->query($sql);
		if (count($rows)!==0) {
			throw new InvalidDataException("Person ID $id not found");
		}
		$row=$rows[0];
		$this->givenName=$row['givenName'];
		$this->familyName=$row['familyName'];
		$this->id=$id;
		$this->changed=false;
	}
	
	public function save() {
		$id=$this->id;
		$given=$this->givenName;
		$family=$this->familyName;
		
		if ($this->id===null) {
			$sql="insert into people(givenName, fanilyName) values (".
						"'$given', '$family')";
			$this->getDB()->execute($sql);
			$this->id=getDB()->insertID();	
		} else {
			$sql="update people ".
					"set givenName='$given', ".
			            "familyName='$family' ".
					"where personID= $personID";
			$this->getDB()->execute($sql);
		}
		$this->hasChanges=false;
	}
	
	public function delete () {
	    $sql="delete from people where personID = $id";
		$rows=$this->getDB()->execute($sql);
		$this->id=$null;
		$this->changed=false;
	}
	
	public static function errorInGivenName($value) {
		if ($value==null || strlen($value)==0) {
			return 'Given name must be specified';
		}
		if (strlen($value)>40) {
			return 'Given name must have no more than 40 characters';
		}
		return null;
	}
	
	public static function errorInFamilyName($value) {
		if ($value==null || strlen($value)==0) {
			return 'Family name must be specified';
		}
		if (strlen($value)>40) {
			return 'Family name must have no more than 40 characters';
		}
		return null;
	}
}
?>