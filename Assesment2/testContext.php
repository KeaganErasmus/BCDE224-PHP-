<?php
	include 'lib/context.php';
	
	$context=Context::createFromConfigurationFile("website.conf");
	
	var_dump($context);
	
	$uri=$context->getURI();
	
	echo '<br/>Site is '.$uri->getSite();
	echo '<br/>Full uri is '.$uri->getRawUri();	
	echo '<br/>Pealing off URI parts ...';
	
	do {
		$part=$uri->getPart();
		if ($part!=='') {
			echo '<br/>Found part: '.$part;
		}
	} while ($part!=='');
	
?>
	