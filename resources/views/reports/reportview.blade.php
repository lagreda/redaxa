@if(isset($data))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <canvas id="c1"></canvas>
        </div>
        @if(count($data['response']['g2']) > 0)
        <div class="col-md-4 col-sm-4 col-xs-4">
            <canvas id="c2"></canvas>
        </div>
        @endif
        @if(count($data['response']['g3']) > 0)
        <div class="col-md-4 col-sm-4 col-xs-4">
            <canvas id="c3"></canvas>
        </div>
        @endif
    </div>

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
            @if(count($data['response']['g2']) > 0)
            var c2 = document.getElementById('c2').getContext('2d');
            @endif
            @if(count($data['response']['g3']) > 0)
            var c3 = document.getElementById('c3').getContext('2d');
            @endif

            @if($data['code'] == '2' || $data['code'] == '3' || $data['code'] == '4')
                var data1 = {
                    datasets: [{
                        data: [{{ $data['response']['g1']['yes'] }}, {{ $data['response']['g1']['no'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            //window.chartColors.orange,
                            window.chartColors.yellow
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'Si',
                        'No'
                    ]
                }

                @if(count($data['response']['g2']) > 0)
                var data2 = {
                    datasets: [{
                        data: [{{ $data['response']['g2']['yes'] }}, {{ $data['response']['g2']['no'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            //window.chartColors.orange,
                            window.chartColors.yellow
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'Si',
                        'No'
                    ]
                }
                @endif

                @if(count($data['response']['g3']) > 0)
                var data3 = {
                    datasets: [{
                        data: [{{ $data['response']['g3']['yes'] }}, {{ $data['response']['g3']['no'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            //window.chartColors.orange,
                            window.chartColors.yellow
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'Si',
                        'No'
                    ]
                }
                @endif
            @endif

            @if($data['code'] == '5')
                var data1 = {
                    datasets: [{
                        data: [{{ $data['response']['g1']['rve1'] }}, {{ $data['response']['g1']['rve2'] }}, {{ $data['response']['g1']['rve3'] }}, {{ $data['response']['g1']['rve4'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'Mejor',
                        'Igual',
                        'Peor',
                        'Sin expectativas'
                    ]
                }

                @if(count($data['response']['g2']) > 0)
                var data2 = {
                    datasets: [{
                        data: [{{ $data['response']['g2']['rve1'] }}, {{ $data['response']['g2']['rve2'] }}, {{ $data['response']['g2']['rve3'] }}, {{ $data['response']['g2']['rve4'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'Mejor',
                        'Igual',
                        'Peor',
                        'Sin expectativas'
                    ]
                }
                @endif

                @if(count($data['response']['g3']) > 0)
                var data3 = {
                    datasets: [{
                        data: [{{ $data['response']['g3']['rve1'] }}, {{ $data['response']['g3']['rve2'] }}, {{ $data['response']['g3']['rve3'] }}, {{ $data['response']['g3']['rve4'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'Mejor',
                        'Igual',
                        'Peor',
                        'Sin expectativas'
                    ]
                }
                @endif
            @endif

            @if($data['code'] == '6')
                var data1 = {
                    datasets: [{
                        data: [{{ $data['response']['g1']['rve1'] }}, {{ $data['response']['g1']['rve2'] }}, {{ $data['response']['g1']['rve3'] }}, {{ $data['response']['g1']['rve4'] }}, {{ $data['response']['g1']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green,
                            window.chartColors.blue
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Bajo',
                        '2',
                        '3',
                        '4',
                        '5 - Alto'
                    ]
                }

                @if(count($data['response']['g2']) > 0)
                var data2 = {
                    datasets: [{
                        data: [{{ $data['response']['g2']['rve1'] }}, {{ $data['response']['g2']['rve2'] }}, {{ $data['response']['g2']['rve3'] }}, {{ $data['response']['g2']['rve4'] }}, {{ $data['response']['g2']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Bajo',
                        '2',
                        '3',
                        '4',
                        '5 - Alto'
                    ]
                }
                @endif

                @if(count($data['response']['g3']) > 0)
                var data3 = {
                    datasets: [{
                        data: [{{ $data['response']['g3']['rve1'] }}, {{ $data['response']['g3']['rve2'] }}, {{ $data['response']['g3']['rve3'] }}, {{ $data['response']['g3']['rve4'] }}, {{ $data['response']['g3']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Bajo',
                        '2',
                        '3',
                        '4',
                        '5 - Alto'
                    ]
                }
                @endif
            @endif

            @if($data['code'] == '7' || $data['code'] == '8')
                var data1 = {
                    datasets: [{
                        data: [{{ $data['response']['g1']['rve1'] }}, {{ $data['response']['g1']['rve2'] }}, {{ $data['response']['g1']['rve3'] }}, {{ $data['response']['g1']['rve4'] }}, {{ $data['response']['g1']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green,
                            window.chartColors.blue
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Nada útil',
                        '2',
                        '3',
                        '4',
                        '5 - Muy útil'
                    ]
                }

                @if(count($data['response']['g2']) > 0)
                var data2 = {
                    datasets: [{
                        data: [{{ $data['response']['g2']['rve1'] }}, {{ $data['response']['g2']['rve2'] }}, {{ $data['response']['g2']['rve3'] }}, {{ $data['response']['g2']['rve4'] }}, {{ $data['response']['g2']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Nada útil',
                        '2',
                        '3',
                        '4',
                        '5 - Muy útil'
                    ]
                }
                @endif

                @if(count($data['response']['g3']) > 0)
                var data3 = {
                    datasets: [{
                        data: [{{ $data['response']['g3']['rve1'] }}, {{ $data['response']['g3']['rve2'] }}, {{ $data['response']['g3']['rve3'] }}, {{ $data['response']['g3']['rve4'] }}, {{ $data['response']['g3']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Nada útil',
                        '2',
                        '3',
                        '4',
                        '5 - Muy útil'
                    ]
                }
                @endif
            @endif

            @if($data['code'] == '9')
                var data1 = {
                    datasets: [{
                        data: [{{ $data['response']['g1']['rve1'] }}, {{ $data['response']['g1']['rve2'] }}, {{ $data['response']['g1']['rve3'] }}, {{ $data['response']['g1']['rve4'] }}, {{ $data['response']['g1']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green,
                            window.chartColors.blue
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Nada satisfecho',
                        '2',
                        '3',
                        '4',
                        '5 - Muy satisfecho'
                    ]
                }

                @if(count($data['response']['g2']) > 0)
                var data2 = {
                    datasets: [{
                        data: [{{ $data['response']['g2']['rve1'] }}, {{ $data['response']['g2']['rve2'] }}, {{ $data['response']['g2']['rve3'] }}, {{ $data['response']['g2']['rve4'] }}, {{ $data['response']['g2']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Nada satisfecho',
                        '2',
                        '3',
                        '4',
                        '5 - Muy satisfecho'
                    ]
                }
                @endif

                @if(count($data['response']['g3']) > 0)
                var data3 = {
                    datasets: [{
                        data: [{{ $data['response']['g3']['rve1'] }}, {{ $data['response']['g3']['rve2'] }}, {{ $data['response']['g3']['rve3'] }}, {{ $data['response']['g3']['rve4'] }}, {{ $data['response']['g3']['rve5'] }}],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        '1 - Nada satisfecho',
                        '2',
                        '3',
                        '4',
                        '5 - Muy satisfecho'
                    ]
                }
                @endif
            @endif

            var pc1 = new Chart(c1,{
                type: '{{ $data['type'] }}',
                data: data1
            })

            @if(count($data['response']['g2']) > 0)
            var pc2 = new Chart(c2,{
                type: '{{ $data['type'] }}',
                data: data2
            })
            @endif

            @if(count($data['response']['g3']) > 0)
            var pc3 = new Chart(c3,{
                type: '{{ $data['type'] }}',
                data: data3
            })
            @endif
    </script>
@else
    <p class="col-xs-12 text-center">No disponible</p>
@endif
