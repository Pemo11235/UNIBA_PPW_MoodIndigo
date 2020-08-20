@extends('.layouts.layout')
<link href="{{URL::asset('css/dashboard.css')}}" rel="stylesheet"/>
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="card lg-12">
                <header class="card-header lg-12">
                    <h4> Lista progetti di Analisi </h4>
                    <span class="float-left">
                          <a href="{{route('analysis.create')}}" class=" btn btn-success btn-sm"> Crea nuovo progetto di analisi</a>
                      </span>
                    <span class="float-right">
                          <a href="http://localhost/MoodIndigo/public/" class=" btn btn-primary btn-sm"> Torna alla Home</a>
                      </span>
                </header>
                <div class="card-block">
                    <div class="row">


                    </div>
                </div>
                <table class="table table-hover p-table">
                    <thead>
                    <tr>
                        <th>Nome Video</th>
                        <th>Nome Progetto</th>
                        <th>Partecipante</th>
                        <th></th>
                        <th>Operazioni</th>
                    </tr>
                    </thead>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <tbody>

                    @foreach( $analyses  as $analysis )
                        <tr>
                            <td class="p-name">
                                <a href="#"> {{ $analysis->nome_video }}</a>
                                <br>

                            </td>
                            <td class="p-team">
                                <a href="#">{{\App\Project::where('id', $analysis->project_id)->pluck('nome_progetto')->first() }}</a>

                            </td>
                            <td><a href="#">{{ Auth::user()->name }} </a></td>
                            <td>

                            </td>
                            <td>
                                <form action="{{ route('analysis.destroy', $analysis->id) }}" method="POST">
                                    <a href="http://localhost/MoodIndigo/public/offline"
                                       class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i> Esegui
                                        Analisi </a>
                                    <a  href="http://localhost/MoodIndigo/public/import" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i> Importa csv analisi video </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                                        Cancella </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </section>
        </div>
    </div>

@endsection
