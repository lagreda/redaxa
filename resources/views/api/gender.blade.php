@extends('api.api_template')

@section('api_content')
    <h4>Géneros</h4>

    <pre>
        <code class="js">
// ** get all genders **********
$ curl -X GET {{ URL::to('/') }}/api/gender \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"Masculino",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"Femenino",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual gender **********
$ curl -X GET {{ URL::to('/') }}/api/gender/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Masculino",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store gender **********
$ curl -X POST {{ URL::to('/') }}/api/gender \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_gender\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"No definido",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update gender **********
$ curl -X PUT {{ URL::to('/') }}/api/gender/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_gender\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Masculino",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete gender **********
$ curl -X DELETE {{ URL::to('/') }}/api/gender/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()