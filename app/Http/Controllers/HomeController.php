<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get();
        $projects = Project::latest()->take(6)->get();
        
        return view('index', compact('services', 'projects'));
    }
}
