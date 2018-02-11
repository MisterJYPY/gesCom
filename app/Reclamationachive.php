<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamationachive extends Model
{
    protected $fillable =[
        'nom','contact','adresse','date','heure','objet','motif','user'
    ];



}
