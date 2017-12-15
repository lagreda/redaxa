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
                                <li><a href="#">Áreas de trabajo</a></li>
                                <li><a href="#">Ciudades Ecuador</a></li>
                                <li><a href="#">Estados civil</a></li>
                                <li><a href="#">Estudiantes</a></li>
                                <li><a href="#">Géneros</a></li>
                                <li><a href="#">Grupos étnicos</a></li>
                                <li><a href="#">Idiomas</a></li>
                                <li><a href="#">Ingresos mensuales</a></li>
                                <li><a href="#">Niveles académicos</a></li>
                                <li><a href="#">Países</a></li>
                                <li><a href="#">Posiciones laborales</a></li>
                                <li><a href="#">Programas</a></li>
                                <li><a href="#">Provincias Ecuador</a></li>
                                <li><a href="#">Tipos de programa</a></li>
                                <li><a href="#">Tipos de sangre</a></li>                                
                            </ul>
                        </div>
                        <div class="col-xs-9">
                            @yield('api_content', '⬅ Seleccione una entidad para explorar API')
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection