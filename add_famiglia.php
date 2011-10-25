<?php

require_once ('bootstrap.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Se è POST arriva dal form
	
	$descrizione = $_POST['descrizione'];
	
	$famiglia = new Famiglia();
	$famiglia->setDescrizione($descrizione);
	
	if($famiglia->validate()) { // Dati validi posso salvare nel db
    $famiglia->save();
    session_start();
    $_SESSION['flash']['esito'] = 'Famiglia creata correttamente...';
    header('Location: list_famiglia.php');
	} else { // C'è stato un errore, aggiungo i messaggi di errore al form
    // Salvo i messaggi di errore in un array
    $errors = array();
    foreach($famiglia->getValidationFailures() as $failure) {
      $errors[] = $failure->getMessage();
    }
    echo $twig->render('famiglia/add.twig', array('errors'=>$errors));
	}	
} else {
	echo $twig->render('famiglia/add.twig');
}

?>