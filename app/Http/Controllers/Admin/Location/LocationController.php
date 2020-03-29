<?php

namespace App\Http\Controllers\Admin\Location;

use App\Services\LocationService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    protected const VIEW_PREFIX = 'admin.location.';

    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        $locations = $this->locationService->getAll();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact(
            'locations'
        ));
    }

    public function create()
    {
        return view(self::VIEW_PREFIX . __FUNCTION__);
    }

    public function store(LocationRequest $locationRequest)
    {
        $this->locationService->create($locationRequest->only('title', 'latitude', 'longitude', 'capacity'));
        return redirect()->to(route('locations.index'));
    }
}
