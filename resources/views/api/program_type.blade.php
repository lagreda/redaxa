@extends('api.api_template')

@section('api_content')
    <h4>Tipos de programa</h4>

    <pre>
        <code class="js">
// ** get all program types **********
$ curl -X GET {{ URL::to('/') }}/api/program-type \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"Maestrías",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"Educación ejecutiva",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual program type **********
$ curl -X GET {{ URL::to('/') }}/api/program-type/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Educación ejecutiva",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store program type **********
$ curl -X POST {{ URL::to('/') }}/api/program-type \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_ec_province\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"Maestría",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update program type **********
$ curl -X PUT {{ URL::to('/') }}/api/program-type/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_program_type\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Doctorados",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete program type **********
$ curl -X DELETE {{ URL::to('/') }}/api/program-type/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" 

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()