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
}