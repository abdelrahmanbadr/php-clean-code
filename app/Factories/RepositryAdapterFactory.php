<?php

namespace App\Factories;

use App\Interfaces\RepositryAdapterInterface;
use App\Adapters\DatabaseRepositoryAdapter;
use App\Adapters\ApiRepositoryAdapter;

class RepositryAdapterFactory
{
    const DB = 'db';
    const API = 'api';
    protected $map;

    public function __contructor($map)
    {
        $this->map = $map;
    }

    public function create($city) :RepositryAdapterInterface
    {
        $repositoryName = $this->getRespositoryName($city);
        if ($repositoryName === DB) {
            return new DatabaseRepositoryAdapter($city);
        } elseif ($repositoryName === API) {
            return new ApiRepositoryAdapter($city);
        } else {
            //thow an error
        }
    }

    protected function getRespositoryName($city)
    {
        return $this->map[$city]??null;
    }
}
