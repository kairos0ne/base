<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'issue','summary','user_story','steps','url','feature_id','jira-key','mvp'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at',
    ];

    /**
     * A project has a client parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Feature');
    }


}