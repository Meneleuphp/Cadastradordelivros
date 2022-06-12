
<!-- Create é a página de formulário que possui a função de captar os inputs para o banco de dados -->

@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event -> title }}</h1>
    <form action = "/events/update/{{ $event->id }}" method="POST" enctype = "multipart/form-data">
        @csrf <!-- Sem essa diretiva o laravel não permite envio para o banco de dados -->
        @method('PUT') <!-- Método utilizado para edição do evento -->
        <div class = "form-group">
            <label for="image"> Imagem do Livro: </label>
            <input type="file" id="image" name="image" class="from-control-file">
        </div>
        <div class = "form-group">
            <label for="title"> Titulo do Livro: </label>
            <input type="text" class= "form-control" id="title" name="title" placeholder="Nome do Evento">
        </div>
        <div class = "form-group">
            <!--textarea é para um volume grande de texto-->
            <label for="title"> Descrição do Livro: </label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição do livro"></textarea> <!-- Ok-->
        </div>
        <div class = "form-group">
            <label for="title"> Autor: </label>
            <input type="text" class= "form-control" id="autor" name="autor" placeholder="Autor"> <!-- !ok -->
        </div>
        <div class = "form-group">
            <label for="title"> Número de Páginas: </label>
            <input type="text" class= "form-control" id="num_paginas" name="num_paginas" placeholder="Número de Páginas"> <!-- !ok -->
        </div>
        <div class = "form-group">
            <label for="title"> Data de Cadastro: </label>
            <input type="date" class= "form-control" id="data" name="data" placeholder="data de Cadastro"> <!-- OK -->
        </div>
        
        <input type="submit" class="btn btn-primary" value= "Cadastrar Livro">
    </form>
</div>

@endsection




