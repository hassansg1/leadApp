<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    protected $guarded = null;

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }

}
