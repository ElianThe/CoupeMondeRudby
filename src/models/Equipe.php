<?php

namespace rugby\models;

use Illuminate\Database\Eloquent\Model as Model;
class Equipe extends Model
{
    protected $table = 'equipe';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function matches (){
        return $this->hasMany('rugby\models\Matchs', 'numEquipeR')->orWhere('numEquipeD', $this->id);
    }

    public static function afficherEquipe() :string {
        $equipes = Equipe::all();
        $affichageTableau = "<table> <tr> <td>id</td> <td>codeEquipe</td> <td>pays</td> <td>couleur</td> <td>entraineur</td> </tr>";
        foreach ($equipes as $equipe){
            $affichageTableau .= "<tr> <td>$equipe->id</td> <td>$equipe->codeEquipe</td> <td>$equipe->pays</td> <td>$equipe->couleur</td> <td>$equipe->entraineur</td> </tr>";
        }
        $affichageTableau .= "</table>";
        return $affichageTableau;
    }
}