
<?php if($message_erreur != '') { ?>
	<p style="background-color: red; color: white">
		<?= $message_erreur ?>
	</p>
<?php } ?>

<?php include('addForm.php'); ?>

<h1>Tous les articles</h1>

<?php foreach ($articles as $article) { ?>
<section>

	<h2>
		<?= $article->getTitle() ?>
	</h2>
	<h3>Écrit par <?= $article->getAuthor()->getName()  ?> le <?= $article->getPublishedAt()->format('d/m/Y à h\hi') ?></h3>
	<?php if($article->getAuthor()->getId() == $_SESSION['user_id']) { ?>
		<form method="post" action="index.php">
			<input type="hidden" name="id_article" value="<?= $article->getId() ?>">
			<button name="deleteArticle">X</button>
		</form>
	<?php } ?>

	<img src="<?= $article->getPicture() ?>" alt="photo" width="200" />
	<p><?= $article->getContent() ?></p>

</section>
<hr>
<?php } ?>


