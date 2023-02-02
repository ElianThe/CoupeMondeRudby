<?php

namespace rugby\models;

use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    protected $table = 'matchs';
    protected $primaryKey = 'numMatch';
    public $timestamps = false;


    public function equipeR()
    {
        return $this->belongsTo('rugby\models\Equipe', 'numEquipeR');
    }

    public function equipeD(){
        return $this->belongsTo('rugby\models\Equipe', 'numEquipeD');
    }

    public static function afficherMatchs () : string {
        $afficherMatch = "<table><tr><td>numMatch</td> <td>dateMatch</td> <td>nbSpect</td> <td>numStade</td> <td>numEquipeR</td> <td>scoreR</td> <td>numEquipeD</td> <td>scoreD</td> <td>nbEssaisD</td></tr>";
        $matchs = Matchs::all();
        foreach ($matchs as $match) {
            $afficherMatch .= "<tr><td>$match->numMatch</td> <td>$match->dateMatch</td> <td>$match->nbSpect</td> <td>$match->numStade</td> <td>$match->numEquipeR</td> <td>$match->scoreR</td> <td>$match->numEquipeD</td> <td>$match->scoreD</td> <td>$match->nbEssaisD</td></tr>";
        }
        $afficherMatch .= "</table>";
        return $afficherMatch;
    }
}