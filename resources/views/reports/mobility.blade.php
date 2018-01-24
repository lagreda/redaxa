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
                    <div class="x_content">
                        <h4 style="color: #1ABB9C;">R1. Cargos antes de iniciar un programa en ESPAE</h4>
                        <div class="entity-search-form">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label for="program_id">Programa</label>
                                    <select name="program_id" id="program_id" class="form-control">
                                        <option value="">- Seleccione uno -</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="group">Promoción</label>
                                    <input type="text" name="group" id="group" class="form-control" placeholder="Promoción">
                                </div>

                                <div class="accordion" role="tablist" style="margin: 10px 0;">
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingOne1" data-toggle="collapse" href="#collapseOne1" aria-expanded="false" aria-controls="collapseOne">
                                            <p class="panel-title">Comparar con otros programas <span class="fa fa-angle-double-down"></span></p>
                                        </a>
                                        <div id="collapseOne1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="program_id">Programa</label>
                                                    <select name="program_id" id="program_id" class="form-control">
                                                        <option value="">- Seleccione uno -</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="group">Promoción</label>
                                                    <input type="text" name="group" id="group" class="form-control" placeholder="Promoción">
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="program_id">Programa</label>
                                                    <select name="program_id" id="program_id" class="form-control">
                                                        <option value="">- Seleccione uno -</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="group">Promoción</label>
                                                    <input type="text" name="group" id="group" class="form-control" placeholder="Promoción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-default">Generar reporte</button>
                            </form>
                        </div>

                        <div class="row">
                            <div id="vue_container">
                                <chart-example
                                :data="{
                                    labels: ['January', 'February'],
                                    datasets: [
                                      {
                                        label: 'Data One',
                                        backgroundColor: '#f87979',
                                        data: [40, 20]
                                      }
                                    ]
                                  }"
                                :options="{responsive: true, maintainAspectRatio: false}"
                                ></chart-example>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>    
@endsection
