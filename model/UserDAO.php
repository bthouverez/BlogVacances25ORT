<?php

class UserDAO {
	private PDO $bdd;

	public function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=blogvacancesort', 'bthouverez', '321654');
		} catch(Exception $e) {
			die('ERROR : '.$e->getMessage());
		}
	}

	// find -> renvoie un utilisateur
	public function find(int $id) : ?User {
		// SQL
		$sql = "SELECT * FROM users WHERE id = ?";
		$stmt = $this->bdd->prepare($sql);
		$stmt->execute([$id]);

		$data = $stmt->fetch(); // ATTENTION, fetch ne ressort qu'une seule ligne du résultat

		if($data) {
			// créer un User et le mettre à jour
			$u = new User();
			$u->setId($data['id']);
			$u->setMail($data['mail']);
			$u->setName($data['name']);
			$u->setPassword($data['password']);

			// renvoyer ce User
			return $u;
		} else {
			return null;
		}
	}


	// findAll -> tableau
	public function findAll() : array {
		// SQL
		$sql = 'SELECT * FROM users';
		$stmt = $this->bdd->query($sql);


		$tab = [];
		$data = $stmt->fetchAll();
		foreach($data as $tabUser) {
			$u = new User();
			$u->setId($tabUser['id']);
			$u->setMail($tabUser['mail']);
			$u->setName($tabUser['name']);
			$u->setPassword($tabUser['password']);
			$tab[] = $u;
		}
		return $tab;
	}

	// create -> créé l'utilisateur en bdd

	// update -> met a jour les infos d'un utilisateur

	// delete -> supprimer un utilisateur


}