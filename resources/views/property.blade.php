@extends('layouts.application')

@section('content')
    <div class="w-full p-10">
    <div class="flex mt-5 pl-8">
        <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Voltar
        </a>
    </div>

        <div class="flex flex-row w-full justify-between rounded overflow-hidden shadow-2xl m-5 h-auto">
            <div class="w-1/2 flex flex-col items-center content-center m-5">
                <img class="w-96 shadow-2xl" src={{$property->image}} alt={{$property->title}} />
            </div>

            <div class="w-1/2 px-6 py-4 h-auto">
                <div class="font-bold text-xl mb-2">{{$property->title}}</div>
                <p class="text-gray-700 text-base">{{$property->address}}</p>
                <div class="pl-5">
                    <p class="code inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$property->code}}</p>
                    <p id="description">Description: {{ $property->description }}</p>
                    <p id="price">Price: {{$property->price}}</p>
                    <p id="bedrooms">Bedrooms: {{$property->bedrooms}}</p>
                    <p id="bathrooms">Bathrooms: {{$property->bathrooms}}</p>
                    <p id="garages">Garages: {{$property->garages}}</p>
                    <p id="responsible">Responsible: {{$property->broker_id}}</p>
                </div>

                <form class="mt-10" method="POST" action="/properties/{{$property->id}}/leads">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('Informe e nós entraremos em contato') }}</label>
                        <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Enviar contato') }}
                    </button>
                    <p class="text-gray-500 text-xs italic">{{ __('Alguém entrará em contato') }}</p>
                </form>
            </div>
        </div>
    </div>
@endsection
