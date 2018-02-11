<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdvrarchive extends Model
{
    protected $fillable =[
        'nom','contact','adresse','date','heure_debut','heure_fin','objetrdv','user','motif'
    ];



}
