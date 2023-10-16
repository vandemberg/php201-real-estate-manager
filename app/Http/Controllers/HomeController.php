<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::with('broker')->get();
        return Inertia::render('Properties/index')
            ->with('properties', $properties);
    }

    public function show(Property $property)
    {
        $property->load('broker');
        return Inertia::render('Property/index')
            ->with('property', $property)
            ->with('csrf_token', csrf_token());
    }
}
