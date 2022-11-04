<?php
	include 'lib/context.php';
	include 'controllers/peopleController.php';
	
	$context=Context::createFromConfigurationFile("website.conf");
	$people = new PeopleController($context);
	$people->process();
	
?>
	