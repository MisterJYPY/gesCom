<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evernement extends Model
{
    protected $fillable =[
        'contenu','date','lieu','heure','user'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }



    public function evernementreport()
    {
        return $this->hasMany(\App\Evernementreporte::class);
    }


    public function clientevernement()
    {
        return $this->hasMany(\App\Clientevernement::class);
    }

}
