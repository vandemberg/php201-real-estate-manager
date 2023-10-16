<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function create(Request $request)
    {
        $request->only('propertyId', 'email');

        $lead = Lead::create([
            'property_id' => $request->propertyId,
            'email' => $request->email,
        ]);

        return request()->json([
            'message' => 'Lead created successfully',
            'lead' => $lead,
        ]);
    }
}
