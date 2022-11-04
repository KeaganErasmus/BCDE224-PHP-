<?php
/*
   A PHP framework for web sites

   Database Connection Class using mysqli
   ======================================
   
*/
//include "lib/interfaces.php";
class Database implements IDatabase
{
	private  $conn ;
	private $isInTransaction;
	
	public function __construct ($host , $user , $password , $database ) {
		$cn = new mysqli($host, $user, $password, $database);	
		if ($cn->connect_errno) {
			throw new DatabaseException($this->sqlError('connect'));
		}
		$this->conn=$cn;
		$this->isInTransaction=false;
	}

    public function query ($sql) {
		$result=$this->conn->query($sql);
		if (!$result) {
			throw new DatabaseException($this->sqlError('query: '.$sql));
		}
		$rows=array();
		while($row = $result->fetch_assoc()){
			$rows[]=$row;
		}
		return $rows;
    }
   
    public function execute ($sql){
		$result=$this->conn->query ($sql);
		if (!$result) {
			throw new DatabaseException($this->sqlError('execute'));
		}
		return $this->conn->affected_rows;
	}
	
	public function executeBatch ($list){
		$count=0;
		foreach ($list as $sql) {
			$count+=$this->execute($sql);
		}
		return $count;
	}
	
	public function getInsertID() {
		return $this->conn->insert_id;
	}
	
	public function close(){
		if ($this->isInTransaction) {
			throw new DatabaseException('A transaction has been started but niot committed');
		}
		$this->conn->close();
	}
	
	public function beginTransaction(){
		if ($this->isInTransaction) {
			throw new DatabaseException('A transaction has already been started');
		}
		$this->conn->autocommit(false);
		$this->isInTransaction=true;
	}
	public function commitTransaction() {
		if (!$this->isInTransaction) {
			throw new DatabaseException('Cannot commit - not in a transaction');
		}
		$this->conn->commit();
		$this->conn->autocommit(true);
		$this->isInTransaction=false;
	}
	public function rollbackTransaction() {
		if (!$this->isInTransaction) {
			throw new DatabaseException('Cannot rollback - not in a transaction');
		}
		$this->conn->rollback();
		$this->conn->autocommit(true);
		$this->isInTransaction=false;	
	}
	
	public function queryPrepared($parameterisedSQL,$fields) {
		throw new DatabaseException("Not yet implemented");
	}
	
    public function executePrepared($parameterisedSQL,$fields) {
		throw new DatabaseException("Not yet implemented");
	}
	
	private function sqlError($source) {
		return 'Unable to '.$source.', MySQL error ('. 
				$this->conn->connect_errno. ') is: '. 
				$this->conn->connect_error;
	}
}
