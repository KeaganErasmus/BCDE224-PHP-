<?php
/*
   A PHP framework for web sites
   
   custom exceptions and common interfaces
   =======================================
   
*/

class DatabaseException extends Exception {}
class InvalidRequestException extends Exception {}
class ConfigurationException extends Exception {}
class InvalidDataException extends Exception {}

interface IDatabase {
    function query($sql);
    function execute($sql);
	function executeBatch($list);
	function getInsertID();
	function close();
	
	// transaction support
	function beginTransaction();
	function commitTransaction();
	function rollbackTransaction();
	
	// prepared statements
	function queryPrepared($parameterisedSQL,$fields);
    function executePrepared($parameterisedSQL,$fields);
}

interface IUri {
	function getSite();
	function getPart();
	function getID();
}

interface IContext {
	function getDB();
	function getURI();
	function getConfig();
}

/*
interface IModel {
	function hasChanges();
	function save();
}

interface IView {
	function setModel($model);
	function setTemplate($template);
	function setTemplateField($name,$value);
	function setTemplateFields($fields);
	function render();
}

interface IController {
	function process();
	//function redirectTo($page);	//
}
*/

?>