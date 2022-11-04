<?php
	include 'lib/context.php';	
	try {
	// common stuff can go here
	
		$context=Context::createFromConfigurationFile("website.conf");
		// getController will throw an exception if the request path is invalid
		// or the user is not authorised for access
		$controller=getController($context->getURI());
		// the approach below is called "convention over configuration"
		// rather than configuring separate class names and routes, we base
		// the pattern on naming and site organisation conventions
		$controllerPath='controllers/'.strtolower($controller).'Controller.php';
		$controllerClass=$controller.'Controller';
		if (isset($controllerPath)) {
			require $controllerPath;
		}
	} catch (Exception $ex) {
		logException ($ex);
		echo 'Page not found<br/>';
		// see comments in next try catch block
		exit;
	}
	// At this stage, we know the controller and that the user is authorised
	// So we just run the selected controller
	try {
	
		$actor = new $controllerClass($context);
		$actor->process();
	} catch (Exception $ex) {
		logException ($ex);
		// for now, we'll just display the message
		echo $ex.getMessage().'<br/>';
		// But, it is bad security practice to reveal exceptions to users
		// later, we'll log the exception and give a looser description of
		// the problem to the user.
	}
	
	function logException ($ex) {
		// do nothing for now
	}
	
	// This is a very simple router
	// We just match the URI to a stub of the controller name
	function getController($uri) {
		$path=$uri->getPart();
		switch ($path) {
			case "personList":
				return "People";
			default:
				throw new InvalidRequestException ("No such page");
		}
		return "People";
	}
?>
