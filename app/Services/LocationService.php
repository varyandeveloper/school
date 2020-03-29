<?php

namespace App\Services;

use App\Models\Location;

class LocationService extends AbstractService
{
    protected $locationModel;

    public function __construct(Location $location)
    {
        $this->locationModel = $location;
    }

    public function getAll()
    {
        return $this->locationModel->all();
    }

    public function create(array $data)
    {
        $location = $this->locationModel::query()->create($data);
        return $location->id;
    }

    public function getAvailableLocations()
    {

    }
}
