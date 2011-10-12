<?php
	
	require_once 'bootstrap.php';

	$template = $twig->loadTemplate('index.twig');
	
	echo $twig->render('index.twig',
		array(
			'projectName' => 'TrizeroBoilerPlate'
		)
	);
	
	
  
?>