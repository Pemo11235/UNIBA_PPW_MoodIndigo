@extends('.layouts.layout')
@section('styles')
    <link href="{{asset('css/welcome.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Qualcosa non va con il tuo input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="highlight-clean" style="background-color:rgba(0,0,0,0.03);">
        <div class="container-fluid" data-bs-hover-animate="rubberBand">
            <h2>Crea Analisi video</h2>
            <form action="{{ route('analysis.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome video</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="nomeHelp"
                           placeholder="Inserisci nome video"
                </div>
                <div class="form-group">
                    <label for="description">Descrizione video</label>
                    <textarea type="text" name="description" class="form-control" id="description"
                              placeholder="Inserisci una breve descrizione del progetto"></textarea>
                </div>
                <div class="form-group">
                    <label for="selezione">Seleziona il progetto</label>
                    <select name="related_id">
                        @foreach($relatedVar as $related)
                            <option value="{{$related->id}}">
                                {{$related->nome_progetto}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crea analisi</button>
                <a href="http://localhost/MoodIndigo/public/analysis/" class=" btn btn-warning float-right active text-white rounded"> Torna alla Dashboard Analisi video</a>
            </form>
        </div>
    </div>

@endsection
