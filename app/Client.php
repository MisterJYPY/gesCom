<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable =[
        'nom','prenom','email','adresse','contact','user','groupe','etoile',
        'code'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class,'user');
    }


}
