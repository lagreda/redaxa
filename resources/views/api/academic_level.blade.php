@extends('api.api_template')

@section('api_content')
    <h4>Niveles académicos</h4>

    <pre>
        <code class="js">
// ** get all academic levels **********
$ curl -X GET {{ URL::to('/') }}/api/academic-level \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"Educación básica",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"Bachillerato",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual academic level **********
$ curl -X GET {{ URL::to('/') }}/api/academic-level/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Bachillerato",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store academic level **********
$ curl -X POST {{ URL::to('/') }}/api/academic-level \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_academic_level\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"Superior",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update academic level **********
$ curl -X PUT {{ URL::to('/') }}/api/academic-level/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_academic_level\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Superior",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete academic level **********
$ curl -X DELETE {{ URL::to('/') }}/api/academic-level/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]"

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()