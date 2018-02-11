<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    protected $fillable =[
        'agence','contact','lieu','heure_debut','date','objet','user','heure_fin','user'
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

}
