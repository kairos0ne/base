<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'overview','objective','project_id','ticket', 'jira_epic', 'status'
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
     * Brief belongs to a project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    /**
     * Brief belongs to many files
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function files()
    {
        return $this->belongsToMany('App\File');
    }
    /**
     * Brief belongs to many files
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function features()
    {
        return $this->hasMany('App\Feature');
    }
}