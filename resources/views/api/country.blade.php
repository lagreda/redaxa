@extends('api.api_template')

@section('api_content')
    <h4>Países</h4>

    <pre>
        <code class="js">
// ** get all countries **********
$ curl -X GET {{ URL::to('/') }}/api/country \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"Alemania",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"Ecuador",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual country **********
$ curl -X GET {{ URL::to('/') }}/api/country/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Colombia",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store country **********
$ curl -X POST {{ URL::to('/') }}/api/country \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_country\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"Chile",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update country **********
$ curl -X PUT {{ URL::to('/') }}/api/country/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_country\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Brasil",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete country **********
$ curl -X DELETE {{ URL::to('/') }}/api/country/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" 

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()