<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin','etat'
    ];

    public function evernement()
    {
        return $this->hasMany(\App\Evernement::class);
    }


    public function client()
    {
        return $this->hasMany(\App\Client::class);
    }

    public function email()
    {
        return $this->hasMany(\App\Email::class);
    }

    public function rdv()
    {
        return $this->hasMany(\App\Rdv::class);
    }


    public function reclamation()
    {
        return $this->hasMany(\App\Reclamation::class);
    }
    public function sms()
    {
        return $this->hasMany(\App\Sms::class);
    }


    public function visite()
    {
        return $this->hasMany(\App\Visite::class);
    }





    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function is_admin(){
       if($this->admin){
           return 1;
       }
      return 0;
    }
}



