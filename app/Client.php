<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name','business_area'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at'
    ];
    /**
     * Client belongs to the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
       return $this->belongsTo('App\User');
    }
    /**
     * Client has many projects
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project()
    {
        return $this->hasMany('App\Project');
    }


}