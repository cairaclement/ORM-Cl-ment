<?php

require_once('autoload.php');

use model\Film;
use model\Orm;

$film =  new Film();
$orm = new Orm();



$film = $film->update('users',['login'=>'lemechant','password'=>'jesuislol123'],'id','3');


var_dump($orm);