<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use App\Models\Lead;
use App\Models\Property;
use Illuminate\Http\Request;
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

    public function leads(Property $property, Request $request)
    {
        Lead::create([
            'email' => $request->get('email'),
            'property_id' => $property->id,
        ]);

        return redirect()->to('/');
    }

    public function dashboard()
    {
        $leads = Lead::all();
        return view('dashboard')
            ->with('leads', $leads);
    }
}
