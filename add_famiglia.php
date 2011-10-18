<?php

require_once ('bootstrap.php');

if (isset($_POST['submit'])){
	
	$descrizione = $_POST['descrizione'];
	
	$famiglia = new Famiglia();
	$famiglia->setDescrizione($descrizione);
	
	if (!$famiglia->validate()){
		echo $twig->render('famiglia/add.twig');
	} else {
		$famiglia->save();
		
		session_start();
		
		$_SESSION['flash']['esito'] = 'Famiglia creata correttamente...';
		
		header("Location: list_famiglia.php");
	}
	
} else {
	echo $twig->render('famiglia/add.twig');
}

?>