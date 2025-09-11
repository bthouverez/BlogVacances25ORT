<?php
require_once('Article.php');
require_once('UserDAO.php');

class ArticleDAO {
	private PDO $bdd;

	public function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=blogvacancesort', 'bthouverez', '321654');
		} catch(Exception $e) {
			die('ERROR : '.$e->getMessage());
		}
	}


	public function find($id) : ?Article {
		$sql = 'SELECT * FROM Articles WHERE id = ?';
		$stmt = $this->bdd->prepare($sql);
		$stmt->execute([$id]);

		$data = $stmt->fetch();
		if($data) {
			$a = new Article();
			$a->setId($data['id']);
			$a->setTitle($data['title']);
			$a->setPublishedAt(new DateTime($data['published_at']));
			$a->setPicture($data['picture']);
			$a->setContent($data['content']);
			$daoUser = new UserDAO;
			$u = $daoUser->find($data['user_id']);
			$a->setAuthor($u);
		}
		return $a;
	}

	public function findAll() : array {
		$sql = 'SELECT * FROM Articles';
		$stmt = $this->bdd->query($sql);

		$tab = [];
		while($data = $stmt->fetch()) {
			$a = new Article();
			$a->setId($data['id']);
			$a->setTitle($data['title']);
			$a->setPublishedAt(new DateTime($data['published_at']));
			$a->setPicture($data['picture']);
			$a->setContent($data['content']);
			$daoUser = new UserDAO;
			$u = $daoUser->find($data['user_id']);
			$a->setAuthor($u);
			$tab[] = $a;
		}
		return $tab;
	}

}