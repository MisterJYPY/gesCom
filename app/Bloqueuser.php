<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloqueuser extends Model
{
    protected $fillable = [
        'name', 'email', 'password','admin','etat','id'
    ];
}
