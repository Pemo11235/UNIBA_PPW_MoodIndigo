@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica il tuo indirizzo E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuovo link di verifica E-mail è stato inviato al tuo indirizzo E-mail.') }}
                        </div>
                    @endif

                    {{ __('Prima di continuare, controlla la tua casella di posta per link di verifica.') }}
                    {{ __('Se non hai ricevuto la E-mail) }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clicca qui per richiedere un altro link di verifica') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
