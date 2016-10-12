<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'user_context','feature_id'
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
     * A feature belongs to a brief
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feature()
    {
        return $this->belongsTo('App\Feature');
    }

    /**
     * A scenario has many Givens
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function givens()
    {
        return $this->hasMany('App\Given');
    }
    /**
     * A scenario has many and Whens
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function whens()
    {
        return $this->hasMany('App\When');
    }
    /**
     * a scenario has many THens
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function thens()
    {
        return $this->hasMany('App\Then');
    }
    /**
     * A scenario has many Ands
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ands()
    {
        return $this->hasMany('App\Continuation');
    }
}