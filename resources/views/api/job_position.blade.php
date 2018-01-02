@extends('api.api_template')

@section('api_content')
    <h4>Posiciones laborales</h4>

    <pre>
        <code class="js">
// ** get all job positions **********
$ curl -X GET {{ URL::to('/') }}/api/job-position \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"CEO",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01"
    },
    {
        "id":2,
        "name":"Gerente Financiero",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00"
    }
]

// ** show individual job position **********
$ curl -X GET {{ URL::to('/') }}/api/job-position/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Gerente de Operaciones",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** store job position **********
$ curl -X POST {{ URL::to('/') }}/api/job-position \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_country\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"Gerente de Marketing",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id":6
}

// ** update job position **********
$ curl -X PUT {{ URL::to('/') }}/api/job-position/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_country\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Gerente Comercial",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01"
}

// ** delete job position **********
$ curl -X DELETE {{ URL::to('/') }}/api/job-position/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" 

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()