<?php
/*
	A PHP framework for web sites

	URI management
	==============
	
*/

class URI {

	private $site;
	private $parts;
	
	public function __construct ($site, $path) {
		$this->site=$site;	
		// store the parts in an array
		$this->parts=explode("/",$path);
	}
	
	// this is the uri up to and including a /
	public function getSite(){
		return $this->site;
	}
	
	// this function will peel of the parts of the URI one by one
	public function getPart(){
		if (count($this->parts)>0) {
			return trim(array_shift($this->parts));	
		} else {
			return '';
		}
	}
	
	// same as get part, but ensure we're getting a numeric ID
	public function getID() {
		$part=$this->getPart();
		if (!ctype_digit($part)) {
			throw new InvalidRequestException('id in URI is not an integer');
		}
		return (int) $part;
	}
	
	// this is not part of the interface - I've added it for testing
	public function getRawUri(){
		return $this->site.implode ('/',$this->parts);
	}
	
	// a static factory method to create a normal uri
	public static function createFromRequest() {
			
		$scheme='http://';
		if (!empty($_SERVER['HTTPS']) && 
			 $_SERVER['HTTPS'] !== 'off'  ||
			 $_SERVER['SERVER_PORT'] == 443 ){
		$scheme='https://';
		}
		$server=$_SERVER['HTTP_HOST'];
		$script=$_SERVER['SCRIPT_NAME'];
		$lastSeg = strrpos($script,"/");
		$script=substr($script,0,$lastSeg);
		
		$site=$scheme.$server.$script.'/';
		
		$path='';
		if (isset($_SERVER['PATH_INFO'])) {
			$path=substr($_SERVER['PATH_INFO'],1);
		}
		return new URI ($site,$path);
	}
}
?>