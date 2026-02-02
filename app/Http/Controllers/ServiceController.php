<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('service', compact('services'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('service-details', compact('service'));
    }
}
