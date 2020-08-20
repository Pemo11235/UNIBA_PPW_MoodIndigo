@extends('.layouts.layout')
<link href="{{URL::asset('css/dashboard.css')}}" rel="stylesheet"/>
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="card lg-12">
                <header class="card-header lg-12">
                    <h4> Lista progetti </h4>
                    <span class="float-left">
                          <a href="{{route('projects.create')}}"
                             class=" btn btn-success btn-sm"> Crea nuovo progetto</a>
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
                        <th>Nome progetto</th>
                        <th>Creato da</th>
                        <th>Partecipanti</th>
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

                    @foreach($projects as $project)
                        <tr>
                            <td class="p-name">
                                <a href="#"> {{ $project->nome_progetto  }}</a>
                                <br>

                            </td>
                            <td class="p-team">
                                <a href="#">{{ \App\User::where('id', $project->user_id)->pluck('name')->first()  }}</a>

                            </td>
                            <td>
                                @if($project->share_1_id === $project->share_2_id )
                                    @if($project->share_1_id === $project->share_3_id )
                                        <a href="#">{{ \App\User::where('id', $project->share_1_id)->pluck('name')->first()  }}.</a>
                                    @else
                                        <a href="#">{{ \App\User::where('id', $project->share_1_id)->pluck('name')->first()  }}, </a>
                                        <a href="#">{{ \App\User::where('id', $project->share_3_id)->pluck('name')->first()  }}.</a>
                                    @endif
                                @elseif($project->share_2_id === $project->share_3_id )
                                    <a href="#">{{ \App\User::where('id', $project->share_1_id)->pluck('name')->first()  }}, </a>
                                    <a href="#">{{ \App\User::where('id', $project->share_2_id)->pluck('name')->first()  }}.</a>
                                @elseif($project->share_3_id === $project->share_1_id )
                                    <a href="#">{{ \App\User::where('id', $project->share_1_id)->pluck('name')->first()  }}, </a>
                                    <a href="#">{{ \App\User::where('id', $project->share_2_id)->pluck('name')->first()  }}.</a>
                                @else
                                    <a href="#">{{ \App\User::where('id', $project->share_1_id)->pluck('name')->first()  }}, </a>
                                    <a href="#">{{ \App\User::where('id', $project->share_2_id)->pluck('name')->first()  }}, </a>
                                    <a href="#">{{ \App\User::where('id', $project->share_3_id)->pluck('name')->first()  }}.</a>
                                @endif


                            </td>
                            <td>
                                {{--@if ($project->analisi == 1)
                                    <span class="tag label-primary">Disponibile</span>
                                @else
                                    <span class="tag label-primary">Non Disponibile</span>
                                @endif--}}
                            </td>
                            <td>
                                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                                        Cancella </a></button>
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
