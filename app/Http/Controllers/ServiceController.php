<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->latest('updated_at')->get();

        return view('service', compact('services'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('service-details', compact('service'));
    }
}
