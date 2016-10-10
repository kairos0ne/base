<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Given extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text','scenario_id'
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
     * a Andgiven belongs to a feature
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feature()
    {
        return $this->belongsTo('App\Scenario');
    }
    /**
     * Given has many ands
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ands()
    {
        return $this->belongsToMany('App\And')>withTimestamps();
    }

}