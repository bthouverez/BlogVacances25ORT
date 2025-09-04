<?php

require_once('model/User.php');

$u = new User();
echo $u;
echo '<br>';

$u = new User(7, "bob", "bob@bib.bub", "123");
echo $u;
echo '<br>';

$u = new User(name: "bob", password: "123");
echo $u;
echo '<br>';

$u->setMail("bob@bib.bub");
echo $u;
echo '<br>';


// Passage par getter et setter "magiques"
$u->id = 42;
#$u->__set('id', 42);
echo $u;
echo '<br>';

$u->pouet = "coucouloulou";
#$u->__set('pouet', 42);
echo $u;
echo '<br>';
