<?php

namespace rugby\models;

use Illuminate\Database\Eloquent\Model as Model;

class Stade extends Model
{
    protected $table = 'stade';
    protected $primaryKey = 'numStade';
    public $timestamps = false;
}