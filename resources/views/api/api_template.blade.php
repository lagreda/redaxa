@extends('layout')

@section('title', 'API')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>API</h2>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Consultar API</h3>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-xs-3">
                            <ul>
                                <li><a href="{{ URL::to('api-info/business-area') }}">Áreas de negocio</a></li>
                                <li><a href="{{ URL::to('api-info/working-area') }}">Áreas de trabajo</a></li>
                                <li><a href="{{ URL::to('api-info/ec-city') }}">Ciudades Ecuador</a></li>
                                <li><a href="{{ URL::to('api-info/civil-status') }}">Estados civil</a></li>
                                <li><a href="#">Estudiantes</a></li>
                                <li><a href="{{ URL::to('api-info/gender') }}">Géneros</a></li>
                                <li><a href="{{ URL::to('api-info/ethnic-group') }}">Grupos étnicos</a></li>
                                <li><a href="{{ URL::to('api-info/language') }}">Idiomas</a></li>
                                <li><a href="{{ URL::to('api-info/monthly-income') }}">Ingresos mensuales</a></li>
                                <li><a href="{{ URL::to('api-info/academic-level') }}">Niveles académicos</a></li>
                                <li><a href="{{ URL::to('api-info/country') }}">Países</a></li>
                                <li><a href="{{ URL::to('api-info/job-position') }}">Posiciones laborales</a></li>
                                <li><a href="{{ URL::to('api-info/program') }}">Programas</a></li>
                                <li><a href="{{ URL::to('api-info/ec-province') }}">Provincias Ecuador</a></li>
                                <li><a href="{{ URL::to('api-info/program-type') }}">Tipos de programa</a></li>
                                <li><a href="{{ URL::to('api-info/blood-type') }}">Tipos de sangre</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-9">
                            @yield('api_content', '⬅ Seleccione una entidad para explorar API')

                            <p style="margin-top: 20px;">Para empezar a uitilizar el API REST de REDAXA, usted deberá estar autenticado en el sistema y disponer de un token de autenticación. Para generar un token de autenticación, ingresar el siguiente comando cURL:</p>
                            <pre>
                                <code class="js">
$ curl -X POST {{ URL::to('/') }}/api/login \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-d "{\"email\": \"your@email.com\", \"password\": \"your_password\"}"

// response example (json):

{
    "data":{
        "id":1,
        "name":"your_name",
        "email":"your@email.com",
        "status":1,
        "api_token":"vAgzOEVmDyhFsDUgyDifmKaZLEyySjxnjlsHXbDtut29hBRwN7uWtFVPN8rt",
        "created_at":null,
        "updated_at":"2017-12-19 10:59:10"
    }
}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection