<?php

class User {

	# attributs
	private int $id;
	private string $name;
	private string $mail;
	private string $password;


	# constructeur (unique en PHP)
	public function __construct($id = 0, $name = "", 
		$mail = "", $password="") {
		$this->id = $id;
		$this->name = $name;
		$this->mail = $mail;
		$this->password = $password;
	}


	# accesseurs
	public function getId(): int { return $this->id; }
	public function setId(int $i): void { $this->id = $i; }
	public function getName(): string { return $this->name; }
	public function setName(string $n): void { $this->name = $n; }
	public function getMail(): string {	return $this->mail;	}
	public function setMail(string $m): void { $this->mail = $m; }
	public function getPassword(): string {	return $this->password;	}
	public function setPassword(string $p): void { $this->password = $p; }

	// Getter et setter "magiques"
	public function __set($attr, $value) {
		if(in_array($attr, ['name', 'mail', 'id', 'password']))
			$this->$attr = $value;
	}
	public function __get($attr) {
		if(in_array($attr, ['name', 'mail', 'id', 'password']))
			return $this->$attr;
		return NULL;
	}

	# toString
	public function __toString() : string {
		return "Ceci est l'utilisateur numéro $this->id, qui s'appelle $this->name dont le mail est $this->mail et le mot de passe : $this->password";
	}

}