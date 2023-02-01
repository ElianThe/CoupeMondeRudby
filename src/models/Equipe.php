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
}