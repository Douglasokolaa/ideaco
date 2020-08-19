<?php

namespace App\Repository\Team;

interface TeamRepositoryInterface
{
    /**
     * Create a new team
     *
     * @param Array $data team information
     */
    public function create($data);

    /**
     * List all teams
     *
     * @return Illuminate\Http\Response
     */
    public function get();

    /**
     * List teams
     *
     * @param String $shortname unique name used to create a url for the workspace
     *
     * @return Illuminate\Http\Response
     */
    public function find($id);
}
