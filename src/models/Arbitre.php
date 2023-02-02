<?php

namespace rugby\models;

use Illuminate\Database\Eloquent\Model as Model;
class Arbitre extends Model
{
    protected $table = 'arbitre';
    protected $primaryKey = 'numArbitre';
    public $timestamps = false;

    public static function afficherArbitre (){
        $arbitres = Arbitre::all();
        $afficherArbitre = "<table><tr> <td>numArbitre</td> <td>nomArbitre</td> <td>nationalite</td> </tr>";
        foreach ($arbitres as $arbitre){
            $afficherArbitre .= "<tr> <td>$arbitre->numArbitre</td> <td>$arbitre->nomArbitre</td> <td>$arbitre->nationalite</td></tr>";
        }
        $afficherArbitre .= "</table>";
        return $afficherArbitre;
    }
}