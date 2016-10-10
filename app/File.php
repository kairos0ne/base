<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','type','extension','brief_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    /**
     * File belongs to many features
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
        /**
     * File belongs to many projects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsToMany('App\Project');
    }

    /**
     * File belongs to many briefs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function briefs()
    {
        return $this->belongsToMany('App\Brief');
    }

    /**
     * File belongs to many features
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feature()
    {
        return $this->belongsToMany('App\Feature');
    }
    /**
     * File belongs to many Bugs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brief()
    {
        return $this->belongsToMany('App\Bug');
    }

}