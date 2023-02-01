<?php

namespace rugby\models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $table = 'poste';

    protected $primaryKey = 'numero';

    public $timestamps = false;
}