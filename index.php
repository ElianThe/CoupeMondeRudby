<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

use rugby\models\Equipe as Equipe;

$db = new DB();
$db->addConnection(parse_ini_file("src/conf/conf.ini"));
$db->bootEloquent();



echo "Question 1: </br>";
echo "A/</br>";
echo \rugby\models\Equipe::afficherEquipe();
//echo \rugby\models\Joueur::afficherJoueur();
//echo \rugby\models\Poste::afficherPoste();
//echo \rugby\models\Arbitre::afficherArbitre();
//echo rugby\models\Stade::afficherStades();
//echo \rugby\models\Matchs::afficherMatchs();