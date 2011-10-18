<?php 

require_once ('bootstrap.php');

$Categorie = CategoriaQuery::create()->find();

$parametri = array(
	'titolo' => 'Lista Categorie',
	'numero' => $Categorie->count(),
	'categorie' => $Categorie
);
 
echo $twig->render('categoria/list.twig', $parametri);

?>