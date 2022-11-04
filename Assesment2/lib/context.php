<?php
/*
	A PHP framework for web sites

	Context management
	==================
	
	
*/
	include 'lib/interfaces.php';
	include 'lib/uri.php';
	include 'lib/database.php';

class Context implements IContext{

	private $db;
	private $uri;
	private $config;
	
	public function __construct ($db, $uri, $config) {
		$this->db=$db;
		$this->uri=$uri;
		$this->config=$config;
	}
	
	public function getDB(){
		return $this->db;
	}
	
	public function getURI(){
		return $this->uri;
	}

	public function getConfig(){
		return $this->config;
	}
	

	public static function createFromConfigurationFile($configFile) {
	
		$configText=file_get_contents('config/'.$configFile);
		$config=json_decode($configText,true,10);
		if ($config===null) {
			throw new ConfigurationException('Invalid configuration file format');
		}
		if (!isset($config['db'])) {
			throw new ConfigurationException('Database configuration missing');
		}
		$dbNode=$config['db'];
	//	var_dump($dbNode);
		if (!isset($dbNode['dbHost'])){
			throw new ConfigurationException('dbHost missing in database configuration');
		}
		if (!isset($dbNode['dbUser'])){
			throw new ConfigurationException('dbUser missing in database configuration');
		}
		if (!isset($dbNode['dbPassword'])) {
			throw new ConfigurationException('dbPassword missing in database configuration');
		}
		if (!isset($dbNode['dbDatabase'])) {
			throw new ConfigurationException('dbDatabase missing in database configuration');
		}
		$dbHost=$dbNode['dbHost'];
		$dbUser=$dbNode['dbUser'];
		$dbPassword=$dbNode['dbPassword'];
		$dbDatabase=$dbNode['dbDatabase'];
		$db=new Database($dbHost, $dbUser, $dbPassword, $dbDatabase);
		unset ($config['db']);  // let's consume this
		$uri=URI::createFromRequest();
	
		return new Context($db,$uri,$config);
	}	
}
?>
