<?php 
	require_once "bootstrap.php";

# Controllo se il form è stato compilato	
	if(isset($_POST['submit'])){
		
		# Controllo l'esistenza dell'utente
			$utente = UtenteQuery::create()
					->filterByUsername($_POST['username'])
					->filterByPassword($_POST['password'])
					->findOne();
					
					
		# Se l'utente esiste	
			if($utente != NULL)	{
					@ session_start();
					$_SESSION['autorizzato'] = 1;
		# Se l'utente è ADMIN
				if($utente->isAdmin()){
					$_SESSION['isAdmin'] = 1;
					header('location: indexAdmin.php');
					die;
				}
				else{
					header('location: index.php');	
					die;
				}

			}	
			else{
				$parametri = array(
						'loginErrore' => 2
				);
				echo $twig->render('login.twig', $parametri);
			}
			
	}
	else {
# Reindirizzo al login
		
		$parametri = array(
						'loginErrore' => 1
					);

		echo $twig->render('login.twig', $parametri);
	}
?>