<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class And extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
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
     * And belongs to Scenario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function given()
    {
        return $this->belongsTo('App\Scenario')->withTimestamps();
    }
    /**
     * And belongs to many Given
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function given()
    {
        return $this->belongsToMany('App\Given')->withTimestamps();
    }

    /**
     * And belongs to many When
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function when()
    {
        return $this->belongsToMany('App\When')->withTimestamps();
    }
    /**
     * And belongs to many When
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function then()
    {
        return $this->belongsToMany('App\Then')->withTimestamps();
    }

}