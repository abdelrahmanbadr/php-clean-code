<?php
require __DIR__ . '/vendor/autoload.php';

use App\Interfaces\ScheduleServiceInterface;
use App\Factories\RepositryAdapterFactory;
use App\Services\ScheduleService;

class PlanService
{
    protected $repositoryFactory;
    protected $scheduleService;
    public function __contractor(ScheduleServiceInterface $scheduleService, RepositryAdapterFactory $repositoryFactory)
    {
        $this->repositoryFactory = $repositoryFactory;
        $this->scheduleService = $scheduleService;
    }
    public function getSchedule($budget, $days, $city): array
    {
        $repository = $this->repositoryFactory->create($city);
        $activities = $repository->getActivities($budget);
        return $this->scheduleService->fromActivities($activities, $days);
    }
}


// data to test
$budget = 200;
$days = 4;
$city = 'berlin';


$map = ["berlin" => 'db', "tokyo" => 'db', "paris" => 'db', 'lisbon' => 'api', 'barcelona' => 'api', 'madrid' => 'api'];
$repositoryFactory = new RepositryAdapterFactory($map);
$scheduleService = new ScheduleService();
$service = new PlanService($scheduleService, $repositoryFactory);
$schedule = $service->get($budget, $days);

print_r($schedule);
