<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evernementreporte extends Model
{
    protected $fillable =[
        'contenu','date','lieu'.'heure','user'
    ];

    public function evernement()
    {
        return $this->belongsTo(\App\Evernement::class);
    }

}
