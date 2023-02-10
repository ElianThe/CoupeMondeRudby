<?php

namespace rugby\models;

class Joueur extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'joueur';

    protected $primaryKey = 'numJoueur';

    public $timestamps = false;

    // le poste d'un joueur
    public function poste (){
        return  $this->belongsTo('rugby\models\Poste', 'numPoste');
    }
    public function equipe(){
        return $this->belongsTo('rugby\models\Equipe', 'CodeEquipe');
    }

    public function matchs () {
        return $this->belongsToMany('rugby\models\Matchs', 'jouer', 'numJoueur', 'numMatch')->withPivot(['tpsJeu', 'titulaire']);
    }

    public static function afficherJoueur () : string {
        $afficherJoueur = "<table><tr><td>numJoueur</td> <td>prenom</td> <td>nom</td> <td>numPoste</td> <td>numEquipe</td></tr>";
        $joueurs = Joueur::all();
        foreach ($joueurs as $joueur) {
            $afficherJoueur .= "<tr><td>$joueur->numJoueur</td> <td>$joueur->prenom</td> <td>$joueur->nom</td> <td>$joueur->numPoste</td> <td>$joueur->numEquipe</td></tr>";
        }
        $afficherJoueur .= "</table>";
        return $afficherJoueur;
    }
}