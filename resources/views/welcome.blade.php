@extends('layouts.application')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Lista de imóveis</h3>
                    <div class="flex justify-between flex-row flex-wrap">
                        @foreach ($properties as $property)
                            <a class="w-full" href="/properties/{{ $property->id }}">
                                <div class="flex flex-row w-full justify-between rounded overflow-hidden shadow-2xl m-5 h-80">
                                    <div class="w-1/2 flex flex-col items-center content-center m-5">
                                        <img class="w-96 shadow-2xl" src={{$property->image}} alt={{$property->title}} />
                                    </div>

                                    <div class="w-1/2 px-6 py-4">
                                        <div class="font-bold text-xl mb-2">{{$property->title}}</div>
                                        <p class="text-gray-700 text-base">{{$property->address}}</p>
                                        <div class="pl-5">
                                            <p class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$property->code}}</p>
                                            <p>Description: {trimDescription($property->description)}</p>
                                            <p>Price: {{$property->price}}</p>
                                            <p>Bedrooms: {{$property->bedrooms}}</p>
                                            <p>Bathrooms: {{$property->bathrooms}}</p>
                                            <p>Garages: {{$property->garages}}</p>
                                            <p>Responsible: {{$property->broker_id}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
