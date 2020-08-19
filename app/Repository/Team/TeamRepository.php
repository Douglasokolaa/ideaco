<?php

namespace App\Repository\Team;

use App\Teams;
use App\TeamOrganization;
use App\TeamUser;
use Illuminate\Support\Str;

class TeamRepository implements TeamRepositoryInterface
{
    protected $team;

    /**
     * Type hint the App\Team class
     * to the repository
     *
     * @param App\Team $team the team model
     *
     * @return void
     */
    public function __construct(Teams $team)
    {
        $this->team = $team;
    }

    /**
     * Create a new team and return
     * the data
     *
     * @param $data Array of team data
     *
     * @return Illuminate\Support\Collection;
     */
    public function create($data)
    {
        $shortname = Str::slug($data['shortname']);

        if ($this->team::where('name', $shortname)->count() > 0) {
            return [
                'errors' => ["shortname" => "short name has been taken"]
            ];
        } else {
            //create the organization
            $team = $this->team::create(
                [
                    'name' => $data['name'],
                    'shortname' => $shortname,
                    'photo_url' => $data['photo_url'],
                ]
            );

            if ($team) {
                TeamOrganization::create(
                    [
                        'team_id' => $team->id,
                        'organisation_id' => $data['organisation_id'],
                    ]
                );

                TeamUser::create(
                    [
                        'team_id' => $team->id,
                        'user_id' => $data['owner_id'],
                    ]
                );
            }

            return $team;
        }
    }

    public function get()
    {
        return $this->team->get();
    }

    public function find($id)
    {
        return $this->team->find($id);
    }
}
