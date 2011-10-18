<?php 

require_once ('bootstrap.php');

$Famiglie = CategoriaQuery::create()->find();

$parametri = array(
	'titolo' => 'Lista famiglie',
	'numero' => $Famiglie->count(),
	'famiglie' => $Famiglie
);
 
echo $twig->render('famiglia/list.twig', $parametri);

?>