<?php

namespace App\Interfaces;

interface RepositryAdapterInterface
{
    public function getActivities($budget) :array;
}
