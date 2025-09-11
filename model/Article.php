<?php
require_once('User.php');


class Article {
	private int $id;
	private string $title;
	private DateTime $published_at;
	private string $picture;
	private string $content;
	private User $author;

	public function __construct(int $id = 0, string $title = "", DateTime $published_at = new DateTime(), string $picture="", string $content = "", User $author=new User) {
		$this->id = $id;
		$this->title = $title;
		$this->published_at = $published_at;
		$this->picture = $picture;
		$this->content = $content;
		$this->author = $author;
	}

	public function getId() : int {
		return $this->id;
	}

	public function setId($id) : void {
		$this->id = $id;
	}

	public function setPublishedAt(DateTime $pa) {
		$this->published_at = $pa;
	}

	public function setTitle(string $title) {
		$this->title = $title;
	}

	public function setContent(string $c) {
		$this->content = $c;
	}
	
	public function setPicture(string $p) {
		$this->picture = $p;
	}

	public function setAuthor(User $u) {
		$this->author = $u;
	}

	public function getTitle() : string {
		return $this->title;
	}


	public function getContent() : string {
		return $this->content;
	}

	public function getAuthor() : User {
		return $this->author;
	}


	public function getPicture() : string {
		return $this->picture;
	}

	public function getPublishedAt() : DateTime {
		return $this->published_at;
	}

	

	
	


	
	
	public function __toString() : string {
		return  "Article{ id=".$this->id.
				"title=".$this->title.
				"published_at=".$this->published_at.
				"picture=".$this->picture.
				"content=".$this->content.
				"author=".$this->author.'}';
	}
}