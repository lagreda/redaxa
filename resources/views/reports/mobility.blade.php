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
                        <h4 style="color: #1ABB9C;">Cargos antes de iniciar un programa en ESPAE</h4>
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
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <canvas id="c1"></canvas>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <canvas id="c2"></canvas>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <canvas id="c3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script>
        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };

        var c1 = document.getElementById('c1').getContext('2d');
        var c2 = document.getElementById('c2').getContext('2d');
        var c3 = document.getElementById('c3').getContext('2d');
        var options = {}
        var data = {
            datasets: [{
                data: [10, 20, 30],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Red',
                'Yellow',
                'Blue'
            ]
        }

        // For a pie chart
        var pc1 = new Chart(c1,{
            type: 'pie',
            data: data,
            options: options
        })
        var pc2 = new Chart(c2,{
            type: 'pie',
            data: data,
            options: options
        })
        var pc3 = new Chart(c3,{
            type: 'pie',
            data: data,
            options: options
        })
    </script>
@endsection
