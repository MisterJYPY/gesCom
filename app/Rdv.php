<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{

    protected $fillable =[
        'nom','adresse','contact','date','heure_debut','heure_fin','objet','nombre_report','user'
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function rdvreporte()
    {
        return $this->hasMany(\App\Rdvreporte::class);
    }



}
