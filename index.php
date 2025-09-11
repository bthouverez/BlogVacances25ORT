<?php
require_once('model/ArticleDAO.php');

$daoArticle = new ArticleDAO();
$articles = $daoArticle->findAll();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tous les articles</title>
</head>
<body>

	<h1>Tous les articles</h1>

	<?php foreach ($articles as $article) { ?>
	<section>

		<h2><?= $article->getTitle() ?></h2>
		<h3>Écrit par <?= $article->getAuthor()->getName()  ?> le <?= $article->getPublishedAt()->format('d/m/Y à h\hi') ?></h3>
		<p><?= $article->getContent() ?>

	</section>
	<hr>
	<?php } ?>


</body>
</html>