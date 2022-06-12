
 <!-- Welcome é como a index, é a página principal que também mostra resultados que vem do banco de dados -->
 
 @extends('layouts.main')

 @section('title', 'MSM Events')

@section('content')




<div id = "search-container" class = "col-md-12">
    <h1>Pesquisar Livros</h1>
    <form action = "/" method="GET">
    <!-- Input do tipo texto - id é search - nome é search - classe form-control - placeholder informa dentro do input.-->
        <input type= "text"  id= "search" name= "search" class="form-control" placeholder= "Procurar ...">
    </form>
</div>
<div id="events-container" class= "col-md-12">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @endif

<h2>Acervo de Livros</h2>
    <p class= "subtitle">Consulte os livros a disposição.</p>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src = "/imagem/events/{{$event->image}}" alt="{{$event -> title}}">
            <div class="card-body">
                <p class="card-date">{{date('d/m/y', strtotime($event->data))}}</p>
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-participants">Nº participantes</p>
               <a href="/events/{{$event->id}}" class="btn btn-primary">Detalhes</a>
            </div>
        </div>
        @endforeach
         <!-- Se a contagem de eventos for igual a zero e search -->
        @if(count($events) == 0 && $search)
        <p class= "resultado" ><strong>O Livro "{{$search}}" não foi encontrado:</strong> </p>
        <a href = "/" class = "retorno">  Retorne a lista de Livros </a> 
        <!-- Se a contagem de eventos for igual a zero, imprima não há eventos agendados -->
        @elseif(count($events) == 0)
            <p>Não há eventos agendados</p>
        @endif
    </div>
</div>


@endsection








