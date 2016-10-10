<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'description','intro','bodycontent','pdfurl','thumbnail','user_id'
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
     * Portfolio belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Portfolio has many files 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function file()
    {
        return $this->hasMany('App\File');
    }
}
