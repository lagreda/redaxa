@extends('api.api_template')

@section('api_content')
    <h4>Ciudades Ecuador</h4>

    <pre>
        <code class="js">
// ** get all ecuador cities **********
$ curl -X GET {{ URL::to('/') }}/api/ec-city \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
[
    {
        "id":1,
        "name":"Guayaquil",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:22:01",
        "updated_at":"2017-12-15 16:22:01",
        "ec_province_id": "1"
    },
    {
        "id":2,
        "name":"Milagro",
        "status":1,
        "additional1":null,
        "additional2":null,
        "additional3":null,
        "created_at":"2017-12-15 16:29:00",
        "updated_at":"2017-12-15 16:29:00",
        "ec_province_id": "1"
    }
]

// ** show individual ecuador city **********
$ curl -X GET {{ URL::to('/') }}/api/ec-city/{id} \
-H "Accept: application/json" \
-H "Authorization: Bearer [your_api_token]"

// response example (json):
{
    "id":1,
    "name":"Guayaquil",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01",
    "ec_province_id": "1"
}

// ** store ecuador city **********
$ curl -X POST {{ URL::to('/') }}/api/ec-city \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_city_name\", \"ec_province_id\": \"province_id\"}"

// response example (json) - HTTP CODE 201:
{
    "name":"Quito",
    "ec_province_id": "3",
    "updated_at":"2017-12-19 12:40:23",
    "created_at":"2017-12-19 12:40:23",
    "id": 4
}

// ** update ecuador city **********
$ curl -X PUT {{ URL::to('/') }}/api/ec-city/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \
-d "{\"name\": \"new_city_name\", \"ec_province_id\": \"province_id\"}"

// response example (json) - HTTP CODE 200:
{
    "id":1,
    "name":"Daule",
    "status":1,
    "additional1":null,
    "additional2":null,
    "additional3":null,
    "created_at":"2017-12-15 16:22:01",
    "updated_at":"2017-12-15 16:22:01",
    "ec_province_id": "1"
}

// ** delete ecuador city **********
$ curl -X DELETE {{ URL::to('/') }}/api/ec-city/{id} \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-H "Authorization: Bearer [your_api_token]" \

// null returned - HTTP CODE 204
        </code>
    </pre>
@endsection()