@extends('api.api_template')

@section('api_content')
    <h4>Áreas de trabajo</h4>

    <pre>
        <code class="js">
// ** get all working areas **********
$ curl -X GET {{ URL::to('/') }}/api/working-area \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"Contabilidad",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"Producción",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual working area **********
$ curl -X GET {{ URL::to('/') }}/api/working-area/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Contabilidad",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store working area **********
$ curl -X POST {{ URL::to('/') }}/api/working-area \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_working_area\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"Marketing",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update working area **********
$ curl -X PUT {{ URL::to('/') }}/api/working-area/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_working_area\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Ventas",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete working area **********
$ curl -X DELETE {{ URL::to('/') }}/api/working-area/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()