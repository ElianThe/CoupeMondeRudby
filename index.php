<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

use rugby\models\Equipe as Equipe;

$db = new DB();
$db->addConnection(parse_ini_file("src/conf/conf.ini"));
$db->bootEloquent();



echo "Question 1: </br>";
echo "question a : </br>";
//echo \rugby\models\Equipe::afficherEquipe();
//echo \rugby\models\Joueur::afficherJoueur();
//echo \rugby\models\Poste::afficherPoste();
//echo \rugby\models\Arbitre::afficherArbitre();
//echo rugby\models\Stade::afficherStades();
//echo \rugby\models\Matchs::afficherMatchs();
echo "</br>";

echo "Question b : </br>"; // select matchs date = 2007-09-22 scoreEquipe > 30
$matchs = \rugby\models\Matchs::where('dateMatch', '2007-09-22')->get();
foreach ($matchs as $match){
    echo $match->afficherMatch($match->numMatch);
}
echo "</br>";

echo "Question c :</br>";
echo \rugby\models\Poste::count() . "</br>" . "</br>";

echo "Question d :</br> ";
$stades = \rugby\models\Stade::where('capacite', '>', 45000)->get();
foreach ($stades as $stade){
    echo $stade->afficherStade($stade->numStade) . "</br>";
}
echo "</br>";

echo "Question e : </br>";
$poste = \rugby\models\Poste::where('libelle', 'Premiere ligne - Pilier gauche')->first();
$joueurs = \rugby\models\Joueur::where('numPoste', 1)->get();
foreach ($joueurs as $joueurPG){
    echo $joueurPG->prenom . " " . $joueurPG->nom . "</br>";
}
echo "</br>";

echo "Question f :</br>";
$woodcock =  \rugby\models\Joueur::where('nom', "Woodcock")->first();
echo $woodcock->poste()->first()->libelle . "</br>";
echo "</br>";

echo "Question g :</br>";
$joueurs = \rugby\models\Joueur::get();
foreach ($joueurs as $joueur){
    echo $joueur->nom . ", : poste : " . $joueur->poste()->first()->libelle  .  "</br>";
}
echo "</br>";

echo "Question h : </br>";
$matchProchain = new \rugby\models\Matchs();
$matchProchain->dateMatch = '2022-12-12';
$match->nbSpect =  3000;
$matchProchain->numStade = 2;
$matchProchain->numEquipeR = 4;
$matchProchain->scoreR = 3;
$matchProchain->nbEssaisR = 3;
$matchProchain->numEquipeD = 4;
$matchProchain->scoreD = 6;
$matchProchain->nbEssaisD = 0;
$matchProchain->save();

echo "</br>";

echo "Question i : </br>";

$mariusJonker = \rugby\models\Arbitre::where('nomArbitre', 'like' ,'Marius Jonker')->first();
$matchs = $mariusJonker->matchs()->get();
foreach ($matchs as $match) {
    echo "Numero de match : " . $match->numMatch . ", dateMatch : " . $match->dateMatch . ", nomStade : " . $match->numStade . "</br>";
}
echo "</br>";

echo "Question j : </br>";
$wayneBarnes = \rugby\models\Arbitre::where('nomArbitre', 'like', 'Wayne Barnes')->first();
$matchs = $wayneBarnes->matchs()->get();
foreach ($matchs as $match){
    echo "Numeros des equipe  qui recevaient des equipes avec comme arbitre Wayne Barnes : ". $match->numEquipeR . " </br>";
}
echo "</br>";


echo "Question k : </br>";
$match = \rugby\models\Matchs::where('dateMatch', '2007-09-23')->where('numEquipeD', '3')->first();
$joueurs = $match->joueurs()->get();
echo "joueurs de l'equipe Neo-Zelandaise qui ont joués contre l'ecosse le 2007-09-23 :</br>";
foreach ($joueurs as $joueur){
    echo $joueur->prenom . ", " . $joueur->nom."</br>";
}

echo "Question l : </br>";
$joueurs = \rugby\models\Joueur::where('numEquipe', 3)->first();
/*
foreach ($joueurs->matchs as $match){
    echo $match-> $match->pivot->tpsJeu;
}*/

$joueurs = \rugby\models\Joueur::where('numEquipe', 3)->get();
foreach ($joueurs as $joueur){
    $afficher = false;
    foreach ($joueur->matchs as $match){
        if ($match->tpsJeu < 80){
            $afficher = true;
        }
    }
    if ($afficher){
        echo $joueur->prenom . ", " . $joueur->nom ;
    }
    echo "</br>";
}

echo "</br>";
echo "Question m : </br>";



// Rechercher les matches de l'équipe Néo-Zélandaise
$matchsNouvelleZelande = \rugby\models\Matchs::where('numEquipeR', 3)->orwhere('numEquipeD', 3)->get();


foreach ($matchsNouvelleZelande as $matchNzPorIta){
    $matchZ = $matchNzPorIta->where('numEquipeD', 11);
    echo $matchNzPorIta->afficherMatch($matchNzPorIta->numMatch);
}
// Récupérer les joueurs qui ont joué dans les matches contre l'Italie et le Portugal
//$joueurs = \rugby\models\Joueur::where()

