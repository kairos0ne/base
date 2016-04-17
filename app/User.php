<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User has many clients
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function client()
    {
        return $this->hasMany('App\Client');
    }

    /**
     * User has many files but owns each
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function file()
    {
        return $this->hasMany('App\File');
    }

}