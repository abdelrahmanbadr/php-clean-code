<?php

namespace App\Adapters;

use App\Interfaces\RepositryAdapterInterface;
use App\Adapters\ApiRepository;

class ApiRepositoryAdapter implements RepositryAdapterInterface
{
    protected $city;
	protected $repository;
	public function __construct($city)
	{
        $this->repository = new ApiRepository($city);
		$this->city = $city;
	}
	public function getActivities($budget)
	{
		return $this->repository->getActivitiesByBudget($budget);
	}
}
