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

	public function checkUser($username, $password) {
		// vérifier sur le username existe
		// vérifier si les mdp correspondent
		// si tout est ok, on rentre l'utilisateur dans la session
	}

	public function create(string $title, string $content, string $picture) {
		$sql = 'INSERT INTO articles VALUES (null, ?, NOW(), ?, ?, ?)';
		$stmt = $this->bdd->prepare($sql);
		$stmt->execute([$title, $picture, $content, $_SESSION['user_id']]);
	}

	public function delete(int $id) {
		$sql = 'DELETE FROM articles WHERE id = ?';
		$stmt = $this->bdd->prepare($sql);
		$stmt->execute([$id]);
	}
}

// create

// delete

?>

