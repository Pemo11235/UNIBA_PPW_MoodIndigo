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
            <h2>Crea progetto</h2>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome Progetto</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="nomeHelp"
                           placeholder="Inserisci nome progetto"
                </div>
                <div class="form-group">
                    <label for="description">Descrizione progetto</label>
                    <textarea type="text" name="description" class="form-control" id="description"
                           placeholder="Inserisci una breve descrizione del progetto"></textarea>
                </div>
                <div class="form-group">
                    <label for="selezione">Seleziona l'utente 1 con cui condividere il progetto:</label>
                    <select name="related_id1">
                        <option value="">Nessuno</option>
                        @foreach($relatedVar as $related)
                            <option value="{{$related->id}}">
                                {{$related->name}}
                            </option>
                        @endforeach
                    </select>
                    <label for="selezione">Seleziona l'utente 2 con cui condividere il progetto:</label>
                    <select name="related_id2">
                        <option value="">Nessuno</option>
                        @foreach($relatedVar as $related)
                            <option value="{{$related->id}}">
                                {{$related->name}}
                            </option>
                        @endforeach
                    </select>
                    <label for="selezione">Seleziona l'utente 3 con cui condividere il progetto:</label>
                    <select name="related_id3">
                        <option value="">Nessuno</option>
                        @foreach($relatedVar as $related)
                            <option value="{{$related->id}}">
                                {{$related->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary rounded">Crea</button>
                <a href="http://localhost/MoodIndigo/public/projects/" class=" btn btn-warning float-right active text-white rounded"> Torna alla Dashboard Progetti</a>
            </form>
        </div>
    </div>

@endsection
