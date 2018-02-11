<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable =[
        'sujet','groupe','objet'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

}
