<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Imóveis</title>
    </head>
    <body>
            @foreach($properties as $key => $property)
                <div>
                    {{ $property->title }}
                    {{ $property->code }}
                    {{ $property->broker_id }}
                </div>
            @endforeach
        </div>
    </body>
</html>
