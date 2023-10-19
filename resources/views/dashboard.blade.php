@extends('layouts.panel')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <h1 class="text-2xl font-bold mb-4">List of Leads</h1>
        <table class="table-auto border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="px-4 py-2 border border-gray-400">Property ID</th>
                    <th class="px-4 py-2 border border-gray-400">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td class="px-4 py-2 border border-gray-400">{{ $lead->property_id }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $lead->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
