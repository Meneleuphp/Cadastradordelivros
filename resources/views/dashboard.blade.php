@extends('layouts.main')

@section('title', 'dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Livros</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    
    @if(count($events) > 0)
    <table class = "table">
        <thead>
            <tr>  <!-- scope significa alcance -->
                <th scope="col">Nº</th>
                <th scope="col">Nome do Livro</th>
                <th scope="col">Autor</th>
                <th scope="col">Nº de Páginas</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach($events as $event)
                <tr>
                    <!-- Roteiro onde serão impressos os eventos TTT --> 
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td>{{ $event->autor }}</td>
                    <td>{{$event->num_paginas}}</td>
                    <td>
                        <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline">Editar</a> 
                        <form action="/events/{{$event->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não possui Livros cadastrados, <a href = "/events/create">Cadastrar Livros</a></p>
    @endif

</div>

@endsection