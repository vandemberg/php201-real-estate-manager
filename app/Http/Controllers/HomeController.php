<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use App\Models\Property;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::with('broker')->get();

        return view('welcome', [
            'properties' => $properties
        ]);
    }

    public function show(Property $property)
    {
        $property->load('broker');

        return view('property')
            ->with('property', $property);
    }

    public function brokers()
    {
        $brokers = Broker::all();

        return view('brokers')
            ->with('brokers', $brokers);
    }
}
