<?php 

require_once ('bootstrap.php');

$Famiglie = FamigliaQuery::create()->find();

session_start();

$parametri = array(
	'titolo' => 'Lista famiglie',
	'numero' => $Famiglie->count(),
	'famiglie' => $Famiglie,
	'esito' => $_SESSION['flash']['esito']
);

echo $twig->render('famiglia/list.twig', $parametri);

unset($_SESSION['flash']);

?>