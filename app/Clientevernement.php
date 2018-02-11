<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientevernement extends Model
{
    protected $fillable =[
        'nom','prenom','email','adresse','contact','user'
    ];

    public function evenerment()
    {
        return $this->belongsTo(\App\Evernement::class);
    }

}
