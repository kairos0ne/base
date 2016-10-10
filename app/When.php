<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class When extends Model
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
     * aAndwhen belongs to a feature
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scenario()
    {
        return $this->belongsTo('App\Scenario');
    }
}