<?php

namespace rugby\models;

class Joueur extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'joueur';

    protected $primaryKey = 'numJoueur';

    public $timestamps = false;

    public function equipe(){
        return $this->belongsTo('rugby\models\Equipe', 'CodeEquipe');
    }
}