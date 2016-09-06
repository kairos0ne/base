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
        'feature','user_context','given', 'when', 'then', 'brief_id'
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
     * A feature has many Andgivens
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function givenAnds()
    {
        return $this->hasMany('App\Andgiven');
    }
    /**
     * A feature has many and whens
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function whenAnds()
    {
        return $this->hasMany('App\Andwhen');
    }
    /**
     * a feature has many Andthens
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function thenAnds()
    {
        return $this->hasMany('App\Andthen');
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