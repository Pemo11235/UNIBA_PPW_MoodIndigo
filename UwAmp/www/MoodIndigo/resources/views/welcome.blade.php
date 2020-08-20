@extends('layouts.layout')
@section('styles')
    <link href="{{asset('css/welcome.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="highlight-clean" style="background-color:rgba(0,0,0,0.03);">
        <div class="container-fluid" data-bs-hover-animate="rubberBand">
            <div class="intro" >

                @guest

                <h2 class="text-center">Benvenuto su&nbsp;</h2>
                <h2 class="text-center">&nbsp;MoodIndigo</h2>
                <p class="text-center">Per iniziare clicca su 'Registrati', o prova la nostra demo, cliccando su 'Prova demo'.&nbsp;<br></p>
                <p class="text-center">Se già possiedi un account clicca invece su 'Accedi'<br></p>
                    @else
                    <h2 class="text-center">Ciao &nbsp;{{ auth()->user()->name }} ! </h2>
                    <h2 class="text-center">Bentornato su MoodIndigo</h2>
                    <p class="text-center">Per continuare accedi alla tua dashboard cliccando su 'Dashboard'.&nbsp;<br></p>
                    <p class="text-center"><br></p>

                @endguest

            </div>
            <div class="buttons">
                @if( auth()->check() )
                    <a class="btn btn-primary active" role="button"  href='{{route('projects.index')}}'">Dashboard Progetti</a>
                    <a class="btn btn-primary active" role="button"  href='{{route('analysis.index')}}'">Dashboard Analisi progetto</a>
                    <a class="btn btn-info active" role="button" onClick="document.location.href='demo'">Analisi Live</a>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Effettua Logout') }}</a>
                @else
                    <a class="btn btn-primary" role="button" onClick="document.location.href='login'" >Accedi</a>
                    <a class="btn btn-light active" role="button" onClick="document.location.href='register'" >Registrati</a>
                    <a class="btn btn-info active" role="button" onClick="document.location.href='demo'">Prova Demo</a>
                @endif

            </div>
        </div>
    </div>

@stop
