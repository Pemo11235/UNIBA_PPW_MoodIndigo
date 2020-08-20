@extends('layouts.layout')

@section('content')

    <style>
        /* tell the SVG path to be a thin blue line without any area fill */

        path {
            stroke: steelblue;
            stroke-width: 1;
            fill: none;
        }

        .axis {
            shape-rendering: crispEdges;
        }

        .x.axis line {
            stroke: lightgrey;
        . stroke-width: 5 px;
        }

        .x.axis .minor {
            stroke-opacity: .5;
        }

        .x.axis path {
            display: none;
        }

        .y.axis line,
        .y.axis path {
            fill: none;
            stroke: #000;
        }

    </style>
    <button type="button" class="btn btn-warning rounded active text-white float-left text-center" data-toggle="modal" data-target=".bd-example-modal-lg">> Istruzioni <</button>
    <a class="btn btn-info rounded float-right active text-white " type="button"  href="http://localhost/MoodIndigo/public/">Torna alla Home</a>
    <a href="http://localhost/MoodIndigo/public/analysis" class=" btn btn-primary float-right active text-white"> Torna alla Dashboard di Analisi</a>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-header text-white active  rounded btn-warning">
                <h5 class="modal-title">Istruzioni d'uso del detector</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-content rounded bg-dark text-white">
                <p> Scegli il video che vuoi analizzare, cliccando su 'Scegli file'. Assicurati che il formato sia .mp4 .</p>
                <p> Una volta caricato il video come previsto, l'analisi si avvierà automaticamente !</p>
                <p> Due grafici e un indicatore ti mostreranno le informazioni catturate da Affectiva in live. </p>
                <p> Al termine dell'analisi ( o durante, cliccando su 'Scarica statistiche') il sistema ti comunicherà quando potrai scaricare l'analisi completa in formato .csv.</p>
                <p> Buon lavoro ! Clicca per continuare ...</p>

            </div>
        </div>
    </div>
    <div class="embed-responsive">
<div class="col-md-auto  border rounded">
    <div class="row-md-4">
            <div id="message"></div>

            <video id="video" style="display:none"></video>

            <canvas id='affectiva_canvas' style="display:none"></canvas>
            <canvas id='viewing_canvas' style="/*padding-top: 10px;padding-left: 80px;padding-right: 10px;padding-bottom: 10px;*/"></canvas>
            <div id="video_control" class="btn-group-lg" style="display:inline;">
                <input type="file" class="upload btn-secondary rounded active" id="fileUp" name="fileUpload" style="display:inline"
                       accept="video/*"/>
                <button type="button" class="btn-danger active rounded" id="reset_btn" style="display: inline;">Reset</button>
                <button type="button" class="btn-warning active rounded" id="download_btn" style="display: inline;">Scarica statistiche</button>
                <button type="button" class="btn-secondary active rounded" id="change_graph_btn" style="display: inline;">Cambia grafico</button>
            </div>


        <div id="mouth_ratio_txt" style="font-size:110%"></div>
        <div id="emotion_txt" style="font-size:110%"></div>
        <div id="graph" class="aGraph" style="display:inline;padding-top: 20px;"> </div>
        <canvas id="angle_canvas"  width="300" height="100" style="border:1px solid #000000;"></canvas>

            </div>

</div>

    </div>

    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script src="https://download.affectiva.com/js/3.2/affdex.js" charset="utf-8"></script>
    <script src="https://rawgit.com/Stuk/jszip-utils/master/dist/jszip-utils.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js" charset="utf-8"></script>
    <script src="{{asset('js/js_mod.js')}}" type="text/javascript"></script>

@endsection
