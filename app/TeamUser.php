<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $table = 'team_user';
    protected $fillable = ['user_id','team_id'];
    public $timestamps = false;


    /**
     * Relationship to find the members
     * of an organzation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany(Teams::class, 'team_id');
    }

    /**
     * Relationship to find the members
     * of an organzation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'id');
    }
}
