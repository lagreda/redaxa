@extends('api.api_template')

@section('api_content')
    <h4>Programas</h4>

    <pre>
        <code class="js">
// ** get all programs **********
$ curl -X GET {{ URL::to('/') }}/api/program \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"MAE Ejecutiva",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"MAE Regular",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual program **********
$ curl -X GET {{ URL::to('/') }}/api/program/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"MGP",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store program **********
$ curl -X POST {{ URL::to('/') }}/api/program \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_program\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"MGH",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update program **********
$ curl -X PUT {{ URL::to('/') }}/api/program/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_program\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"MAS",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete program **********
$ curl -X DELETE {{ URL::to('/') }}/api/program/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" 

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()