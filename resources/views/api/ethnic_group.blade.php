@extends('api.api_template')

@section('api_content')
    <h4>Grupos étnicos</h4>

    <pre>
        <code class="js">
// ** get all ethnic groups **********
$ curl -X GET {{ URL::to('/') }}/api/ethnic-group \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"Blanco",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"Mestizo",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual ethnic group **********
$ curl -X GET {{ URL::to('/') }}/api/ethnic-group/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Blanco",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store ethnic group **********
$ curl -X POST {{ URL::to('/') }}/api/ethnic-group \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_ethnic_group\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"Negro",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update ethnic group **********
$ curl -X PUT {{ URL::to('/') }}/api/ethnic-group/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_ethnic_group\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Mulato",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete ethnic group **********
$ curl -X DELETE {{ URL::to('/') }}/api/ethnic-group/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()