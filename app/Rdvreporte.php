<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdvreporte extends Model
{
    protected $fillable =[
        'nom','contact','adresse','dateprevu','datereport',
        'heure_debutprevu','heure_finprevu',
        'heure_debutreport','heure_finreport',
        'objet','rdv','user','motif'
    ];


    public function rdv()
    {
        return $this->belongsTo(\App\Rdv::class);
    }
}
