<?php

namespace rugby\models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $table = 'poste';

    protected $primaryKey = 'numero';

    public $timestamps = false;

    public static function afficherPoste () : string {
        $afficherPoste = "<table> <tr><td>numero</td> <td>libelle</td></tr>";
        $postes = Poste::all();
        foreach ($postes as $poste){
            $afficherPoste .= "<tr><td>$poste->numero</td> <td>$poste->libelle</td></tr>";
        }
        $afficherPoste .= "</table>";
        return $afficherPoste;
    }
}