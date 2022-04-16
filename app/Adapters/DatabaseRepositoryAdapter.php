<?php

namespace App\Adapters;

use App\Interfaces\RepositryAdapterInterface;
use App\Adapters\DatabaseRepository;

class DatabaseRepositoryAdapter implements RepositryAdapterInterface
{
    protected $city;
	protected $repository;
	public function __construct($city)
	{
        $this->repository = new DatabaseRepository($city);
		$this->city = $city;
	}
	public function getActivities($budget)
	{
		return $this->repository->getActivitiesFromApi($budget);
	}
}
