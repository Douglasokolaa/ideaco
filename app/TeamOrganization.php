<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamOrganization extends Model
{
    protected $table = 'team_organization';

    protected $fillable = ['team_id', 'organization_id'];

    public $timestamps = false;



}
