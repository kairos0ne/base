<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'feature', 'brief_id', 'jira-feature', 'mvp'
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
    public function client()
    {
        return $this->belongsTo('App\Brief');
    }

    /**
     * A feature has many Scenarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scenarios()
    {
        return $this->hasMany('App\Scenario');
    }    

    /**
     * A feature has many bugs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function thenAnds()
    {
        return $this->hasMany('App\Bugs');
    }
}