@extends('api.api_template')

@section('api_content')
    <h4>Provincias Ecuador</h4>

    <pre>
        <code class="js">
// ** get all ecuador provinces **********
$ curl -X GET {{ URL::to('/') }}/api/ec-province \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"Azuay",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"Guayas",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual ecuador province **********
$ curl -X GET {{ URL::to('/') }}/api/ec-province/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Santa Elena",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store job ecuador province **********
$ curl -X POST {{ URL::to('/') }}/api/ec-province \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_ec_province\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"Manabí",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update ecuador province **********
$ curl -X PUT {{ URL::to('/') }}/api/ec-province/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_ec_province\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Esmeraldas",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete ecuador province **********
$ curl -X DELETE {{ URL::to('/') }}/api/ec-province/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" 

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()