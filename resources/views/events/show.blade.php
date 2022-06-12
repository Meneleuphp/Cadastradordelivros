
<!-- Imprime resultados captados pelo banco de dados, mostra o que foi captado do create para o banco de dados. -->

@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class= "col-md-6">
                <img src="/imagem/events/{{$event->image}}" class="img-fluid" alt="{{$event->title}}">
            </div>
            <div id="info-container" class= "col-md-6">
                <h1>Nome do Livro: {{$event->title}}<h1>
                <p class="event-city"><img src = "/icon/boneco.png"  class="location">Autor: {{ $event->city }}</p>
                <p class= "event-partipants"><img src = "/icon/paginas.png"  class="person"> Número de Páginas:</p>
                
                <p class="event-date"><img src = "/icon/calendario.png"  class="calendario">{{date('d/m/y', strtotime($event->data))}}</p>
                <p class="event-owner"  class="star"><strong>Cadastrado por: </strong>{{$eventOwner['name']}}</p>
            
               
            </div>
            <div class="col-md-12" id="description-container">
                <h4><strong>Sobre o evento:</strong></h4>
                <p class="event-description">{{ $event->description}}</p>
            </div>  
        </div>
    </div>


@endsection





