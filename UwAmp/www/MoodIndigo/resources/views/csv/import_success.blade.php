@extends('layouts.layout')

@section('content')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import</div>

                    <div class="panel-body">
                        <canvas id="myChart" width="800" height="400"></canvas>
                        <script type="text/javascript" language="javascript" >


                            var ctx = document.getElementById('myChart');

                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [{{ $data[0] }}],
                                    datasets: [{
                                        label: 'Emozioni',
                                        data: [@foreach( $data as $foo)
                                        {{!! $foo !!}}],
                                        @endforeach
                                    }],
                                },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]

                                            }
                                        }

                            });






                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/csvtocharts.js')}}" type="text/javascript"></script>--}}
@endsection
