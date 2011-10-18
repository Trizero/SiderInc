<?php 

require_once ('bootstrap.php');

$MacroCategorie = MacrocategoriaQuery::create()->find();

$parametri = array(
	'titolo' => 'Lista Macro Categorie',
	'numero' => $MacroCategorie->count(),
	'macrocategorie' => $MacroCategorie
);
 
echo $twig->render('macrocategoria/list.twig', $parametri);

?>