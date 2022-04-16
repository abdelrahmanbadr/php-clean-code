<?php

namespace App\Interfaces;

interface ScheduleServiceInterface
{
    public function fromActivities($activities, $days) :array;
}
