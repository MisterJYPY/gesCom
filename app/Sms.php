<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $fillable =[
        'contenu','user'
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

}
