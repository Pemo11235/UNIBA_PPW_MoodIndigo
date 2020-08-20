@extends('layouts.layout')

@section('styles')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:300italic,700italic,300,700);

        body {
            font-family: 'Lato';
            background-color: #f0f0f0;

            max-width: 100%;
        }

        #overlay {
            position: absolute;
            top: 0px;
            left: 0px;
            -o-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            /*IE*/
            filter: fliph; /*IE*/

            width: 600px;
            height: 450px;
        }

        #overlay {
            -ms-filter: fliph;
        }

        #videoel {
            -o-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            -ms-filter: fliph; /*IE*/
            filter: fliph; /*IE*/

            width: 600px;
            height: 450px;
        }

        #container {
            position: relative;
            width: 370px;
            /*margin : 0px auto;*/
        }

        #content {
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            max-width: 600px;
        }

        #sketch, #filter {
            display: none;
        }

        h2 {
            font-weight: 400;
        }

        .btn {
            font-family: 'Lato';
            font-size: 16px;
        }

        #controls {
            text-align: center;
        }

        #emotion_container {
            width: 500px;
        }

        #emotion_icons {
            height: 50px;
            padding-left: 40px;
        }

        .emotion_icon {
            width: 40px;
            height: 40px;
            margin-top: 5px;
            /*margin-left : 13px;*/
            margin-left: 35px;
        }

        #emotion_chart, #emotion_icons {
            margin: 0 auto;
            width: 400px;
        }

        #icon1, #icon2, #icon3, #icon4, #icon5, #icon6 {
            visibility: hidden;
        }

        /* d3 */
        .bar {
            fill: steelblue;
            fill-opacity: .9;
        }

    </style>
    <script>
        // getUserMedia only works over https in Chrome 47+, so we redirect to https. Also notify user if running from file.
        if (window.location.protocol == "file:") {
            alert("You seem to be running this example directly from a file. Note that these examples only work when served from a server or localhost due to canvas cross-domain restrictions.");
        } else if (window.location.hostname !== "localhost" && window.location.protocol !== "https:") {
            window.location.protocol = "https";
        }
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-32642923-1']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
@stop

@section('content')
    <div class="row bg-light border rounded justify-content-center">

            <script src="{{asset('js/utils.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/clmtrackr.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/model_pca_20_svm_emotionDetection.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/Stats.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/d3.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/emotion_classifier.js')}}" type="text/javascript"></script>
            <script src="{{asset('js/emotionmodel.js')}}" type="text/javascript"></script>
            <div class="col-md-10 text-center">

                <h3 class="">Cattura le tue emozioni live !</h3>
                <br>
            </div>
            <div class="row ">
                <div id="container" height="75%" class="col-8  ">
                    <video id="videoel" class="rounded embed-responsive embed-responsive-4by3" width="400" height="300" preload="auto" loop>
                    </video>
                    <canvas id="overlay" width="400" height="300"></canvas>
                    <br>
                </div>
                <canvas id="sketch" width="400" height="300"></canvas>

                <div id="emotion_container" class="col-4">
                    <div id="emotion_icons" class="border rounded">
                        <img class="emotion_icon" id="icon1" src="{{asset('img/icon_angry.png')}}">
                        <img class="emotion_icon" id="icon2" src="{{asset('img/icon_sad.png')}}">
                        <img class="emotion_icon" id="icon3" src="{{asset('img/icon_surprised.png')}}">
                        <img class="emotion_icon" id="icon4" src="{{asset('img/icon_happy.png')}}">
                    </div>
                    <div id='emotion_chart' class="align-content-center border rounded"></div>
                    <br>
                    <p>Premi Start per avviare l'analisi Live ! </p>
                    <p> Sulla destra è riportato il grafico conseguente all'analisi del tuo viso. Ti consigliamo di avvicinarti e di posizionare il viso al centro della fotocamera per un risultato migliore !</p>
                </div>

                <div id="controls" class="col-md-12 text-md-left">
                    <input class="btn btn-success rounded active col-md-2"  type="button" value="Caricamento" disabled="disabled" onclick="startVideo()" id="startbutton">
                    <input class="btn btn-danger  rounded active col-md-2" type="button" value="Stop" onclick="stopVideo()" id="startbutton">
                    <a class="btn btn-warning rounded float-right active text-white " type="button"  href="http://localhost/MoodIndigo/public/">Torna alla Home</a>
                    <br><br>
                </div>

                </div>

    </div>


                <script>
                    var vid = document.getElementById('videoel');
                    var overlay = document.getElementById('overlay');
                    var overlayCC = overlay.getContext('2d');

                    /********** check and set up video/webcam **********/

                    function enablestart() {
                        var startbutton = document.getElementById('startbutton');
                        startbutton.value = "Start";
                        startbutton.disabled = null;
                    }

                    /*var insertAltVideo = function(video) {
                        if (supports_video()) {
                            if (supports_ogg_theora_video()) {
                                video.src = "../media/cap12_edit.ogv";
                            } else if (supports_h264_baseline_video()) {
                                video.src = "../media/cap12_edit.mp4";
                            } else {
                                return false;
                            }
                            //video.play();
                            return true;
                        } else return false;
                    }*/
                    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
                    window.URL = window.URL || window.webkitURL || window.msURL || window.mozURL;

                    // check for camerasupport
                    if (navigator.getUserMedia) {
                        // set up stream

                        var videoSelector = {video: true};
                        if (window.navigator.appVersion.match(/Chrome\/(.*?) /)) {
                            var chromeVersion = parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10);
                            if (chromeVersion < 20) {
                                videoSelector = "video";
                            }
                        }
                        ;

                        navigator.getUserMedia(videoSelector, function (stream) {
                            if (vid.mozCaptureStream) {
                                vid.mozSrcObject = stream;
                            } else {
                                //vid.src = (window.URL && window.URL.createObjectURL(stream)) || stream;
                                vid.srcObject = (stream)
                            }
                            vid.play();
                        }, function () {
                            //insertAltVideo(vid);
                            alert("There was some problem trying to fetch video from your webcam. If you have a webcam, please make sure to accept when the browser asks for access to your webcam.");
                        });
                    } else {
                        //insertAltVideo(vid);
                        alert("This demo depends on getUserMedia, which your browser does not seem to support. :(");
                    }

                    vid.addEventListener('canplay', enablestart, false);

                    /*********** setup of emotion detection *************/

                    var ctrack = new clm.tracker({useWebGL: true});
                    ctrack.init(pModel);

                    function startVideo() {
                        // start video
                        vid.play();
                        // start tracking
                        ctrack.start(vid);
                        // start loop to draw face
                        drawLoop();
                    }

                    function stopVideo() {
                        // start video
                        vid.pause();
                        // start tracking
                        //ctrack.start(vid);
                        // start loop to draw face
                        //drawLoop();
                        var audio = new Audio('resource/thankyou.wav');
                        audio.play();
                    }

                    function drawLoop() {
                        requestAnimFrame(drawLoop);
                        overlayCC.clearRect(0, 0, 400, 300);
                        //psrElement.innerHTML = "score :" + ctrack.getScore().toFixed(4);
                        if (ctrack.getCurrentPosition()) {
                            ctrack.draw(overlay);

                        }
                        var cp = ctrack.getCurrentParameters();

                        var er = ec.meanPredict(cp);
                        if (er) {
                            updateData(er);
                            for (var i = 0; i < er.length; i++) {
                                if (er[i].value > 0.4) {
                                    document.getElementById('icon' + (i + 1)).style.visibility = 'visible';
                                } else {
                                    document.getElementById('icon' + (i + 1)).style.visibility = 'hidden';
                                }
                            }
                        }
                    }

                    var ec = new emotionClassifier();
                    ec.init(emotionModel);
                    var emotionData = ec.getBlank();

                    /************ d3 code for barchart *****************/

                    var margin = {top: 20, right: 20, bottom: 10, left: 40},
                        width = 400 - margin.left - margin.right,
                        height = 100 - margin.top - margin.bottom;

                    var barWidth = 30;

                    var formatPercent = d3.format(".0%");

                    var x = d3.scale.linear()
                        .domain([0, ec.getEmotions().length]).range([margin.left, width + margin.left]);

                    var y = d3.scale.linear()
                        .domain([0, 1]).range([0, height]);

                    var svg = d3.select("#emotion_chart").append("svg")
                        .attr("width", width + margin.left + margin.right)
                        .attr("height", height + margin.top + margin.bottom)

                    svg.selectAll("rect").data(emotionData).enter().append("svg:rect").attr("x", function (datum, index) {
                        return x(index);
                    }).attr("y", function (datum) {
                        return height - y(datum.value);
                    }).attr("height", function (datum) {
                        return y(datum.value);
                    }).attr("width", barWidth).attr("fill", "#2d578b");

                    svg.selectAll("text.labels").data(emotionData).enter().append("svg:text").attr("x", function (datum, index) {
                        return x(index) + barWidth;
                    }).attr("y", function (datum) {
                        return height - y(datum.value);
                    }).attr("dx", -barWidth / 2).attr("dy", "1.2em").attr("text-anchor", "middle").text(function (datum) {
                        return datum.value;
                    }).attr("fill", "white").attr("class", "labels");

                    svg.selectAll("text.yAxis").data(emotionData).enter().append("svg:text").attr("x", function (datum, index) {
                        return x(index) + barWidth;
                    }).attr("y", height).attr("dx", -barWidth / 2).attr("text-anchor", "middle").attr("style", "font-size: 12").text(function (datum) {
                        return datum.emotion;
                    }).attr("transform", "translate(0, 18)").attr("class", "yAxis");

                    function updateData(data) {
                        // update
                        var rects = svg.selectAll("rect")
                            .data(data)
                            .attr("y", function (datum) {
                                return height - y(datum.value);
                            })
                            .attr("height", function (datum) {
                                return y(datum.value);
                            });
                        var texts = svg.selectAll("text.labels")
                            .data(data)
                            .attr("y", function (datum) {
                                return height - y(datum.value);
                            })
                            .text(function (datum) {
                                return datum.value.toFixed(1);
                            });

                        // enter
                        rects.enter().append("svg:rect");
                        texts.enter().append("svg:text");

                        // exit
                        rects.exit().remove();
                        texts.exit().remove();
                    }

                    /******** stats ********/

                    stats = new Stats();
                    stats.domElement.style.position = 'absolute';
                    stats.domElement.style.top = '0px';
                    document.getElementById('container').appendChild(stats.domElement);

                    // update stats on every iteration
                    document.addEventListener('clmtrackrIteration', function (event) {
                        stats.update();
                    }, false);

                </script>

    </div>
@stop
