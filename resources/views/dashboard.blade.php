@extends('layouts.main')

@section('title', 'dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    
    @if(count($events) > 0)
    <table class = "table">
        <thead>
            <tr>  <!-- scope significa alcance -->
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
    </table>
    <tbody>
        @foreach($events as $event)
            <tr>
                <!-- Roteiro onde serão impressos os eventos -->
                <th scropt="row">{{ $loop->index + 1 }}</th>
                <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
            </tr>
        @endforeach
    </tbody>
    @else
    <p>Você ainda não possui eventos, <a href = "/events/create">Criar Evento</a></p>
    @endif

</div>

@endsection