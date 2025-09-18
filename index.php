<?php
session_start();
require_once('model/ArticleDAO.php');

// simule une connexion utilisateur
$_SESSION['username'] = 'pmartin';
$_SESSION['user_id'] = 2;


$message_erreur = '';

$daoArticle = new ArticleDAO();

// traitement de l'ajout
if(isset($_POST['btnAjoutArticle'])) {
	/// vérifier les champs
	if(isset($_POST['title']) && $_POST['title'] != "") {
		if(isset($_POST['content']) && $_POST['content'] != "") {
			$picture = '';
			if(isset($_POST['picture'])) {
				if($_POST['picture'] == '') {
					$picture = "https://storage.googleapis.com/smartphoto-express-production-wp-blogs-com/10/2018/07/ThinkstockPhotos-119353260_55e9890de3b9c.jpg";
				} else {
					$picture = $_POST['picture'];
				}
			}

			// tout est bon
			$daoArticle->create($_POST['title'], $_POST['content'], $picture);

		} else $message_erreur = 'Contenu non rempli';
	} else $message_erreur = 'Titre non rempli';
}

// traitement de la suppression
if(isset($_POST['deleteArticle'])) {
	$daoArticle->delete($_POST['id_article']);	
}


$articles = $daoArticle->findAll();




include('view/skeleton.php');
