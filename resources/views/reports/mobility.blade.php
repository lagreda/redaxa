@extends('layout')

@section('title', 'Reporte de Movilidad')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>Reporte de Movilidad</h2>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>Buscar reportes</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content ind_report">
                        <div class="entity-search-form">
                            <form class="form-inline" id="fo">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="program_id">Seleccionar tipo de reporte</label>
                                    <select name="report_type" id="report_type" class="form-control" style="width: 250px;">
                                        <option value="">- Seleccione uno -</option>
                                        <option value="2">Reporte de ascenso laboral</option>
                                        <option value="3">Reporte de incremento salarial</option>
                                        <option value="4">Reporte de incremento de responsabilidades</option>
                                        <option value="5">Situación laboral - realidad vs. expectativas</option>
                                        <option value="6">Nivel de pertenencia ESPAE</option>
                                        <option value="7">Utilidad de conocimientos ESPAE en trabajo</option>
                                        <option value="8">Utilidad de conocimientos ESPAE en vida</option>
                                        <option value="9">Nivel de satisfacción con ESPAE</option>
                                    </select>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label for="program_id">Programa</label>
                                    <select name="program_id" id="program_id" class="form-control" style="width: 250px;">
                                        <option value="">- TODOS -</option>
                                        @foreach($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="group">Promoción</label>
                                    <input type="text" name="group" id="group" class="form-control" placeholder="Promoción">
                                </div>

                                <div class="accordion" role="tablist" style="margin: 10px 0;">
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingOne1" data-toggle="collapse" href="#collapseOne2" aria-expanded="false" aria-controls="collapseOne">
                                            <p class="panel-title">Comparar con otros programas <span class="fa fa-angle-double-down"></span></p>
                                        </a>
                                        <div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="program_id_c_1">Programa</label>
                                                    <select name="program_id_c_1" id="program_id_c_1" class="form-control" style="width: 250px;">
                                                            <option value="">- Seleccione uno -</option>
                                                            @foreach($programs as $program)
                                                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="program_group_c_1">Promoción</label>
                                                    <input type="text" name="program_group_c_1" id="program_group_c_1" class="form-control" placeholder="Promoción">
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="program_id_c_2">Programa</label>
                                                    <select name="program_id_c_2" id="program_id_c_2" class="form-control" style="width: 250px;">
                                                            <option value="">- Seleccione uno -</option>
                                                            @foreach($programs as $program)
                                                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="program_group_c_2">Promoción</label>
                                                    <input type="text" name="program_group_c_2" id="program_group_c_2" class="form-control" placeholder="Promoción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-default" onclick="generateReport('f2', '{{ URL::to('reports/had-promotion-after-espae') }}');">Generar reporte</button>
                            </form>
                        </div>

                        <div class="row" id="rf"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection
