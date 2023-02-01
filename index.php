<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use rugby\models\Poste as Poste;

use rugby\models\Equipe as Equipe;

$db = new DB();
$db->addConnection(parse_ini_file("src/conf/conf.ini"));
$db->bootEloquent();



echo "Question 1: </br>";
