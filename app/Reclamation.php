<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $fillable =[
        'nom','contact','adresse','date','heure','objet','user'
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
