<?php

namespace rugby\models;

use Illuminate\Database\Eloquent\Model as Model;

class Stade extends Model
{
    protected $table = 'stade';
    protected $primaryKey = 'numStade';
    public $timestamps = false;

    public function afficherStade($id) : string {
        $stade = Stade::where('numStade', $id)->first();
        return "NumStade :" . $stade->numStade . ", ville : " . $stade->ville . ", nomStade : " . $stade->nomStade . ", capacite : " . $stade->capacite;
    }

    public static function afficherStades() : string {
        $afficheStades = "<table> <tr><td>numStade</td> <td>ville</td> <td>nomStade</td> <td>capacite</td></tr>";
        $stades = Stade::all();
        foreach ($stades as $stade){
            $afficheStades .= "<tr><td>$stade->numStade</td> <td>$stade->ville</td> <td>$stade->nomStade</td> <td>$stade->capacite</td></tr>";
        }
        $afficheStades .= "</table>";
        return $afficheStades;
    }
}