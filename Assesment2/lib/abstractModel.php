<?php
	abstract class AbstractModel {
	
		private $db;
		
		public function __construct(IDatabase $db){
			$this->db=$db;
		}
		public function getDB() {
			return $this->db;
		}
		public function hasChanges() {
			return false;
		}
		public function save() {
		}		
	}
	
?>