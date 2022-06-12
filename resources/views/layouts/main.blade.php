
<!-- O main.blade além de guardar os links de estilização de CSS e bootstrap, também é responsável pelo Menu de navegação -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        
        <!--Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">


        <!--CSS Bootstrap -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

        <!--CSS bootstrap 2 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel= "stylesheet">

        <!-- CSS bootstrap cards -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        


        <!-- CSS da aplicação -->
        <link rel= "stylesheet" href="/css/styles.css">
        <script src= "/js/scripts.js"></script>

    </head>
    <body>
        <header class = "response">
            <nav class = "navbar navbar-expand-lg navbar-light">
                <div class = "collapse navbar-collapse" id="navbar">
                    <a href= "/" class="navbar-brand">
                        <img src = "/imagem/cubo2.png" class="cubo" alt="cubo" >   
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href = "/" class = "nav-link"> LISTA DE LIVROS</a>
                        </li>
                        <li class="nav-item">
                            <a href = "/events/create" class = "nav-link"> ADICIONAR LIVROS</a>
                        </li>
                        <!-- Autenticado -->
                        @auth 
                        <li class="nav-item">
                            <!-- Dashboard significa painel de controle -->
                            <a href = "/dashboard" class = "nav-link"> MEUS LIVROS</a>
                        </li>
                        <li class="nav-item">
                            <form action = "/logout" method = "POST">
                                @csrf  <!-- Sem o @CSRF o blade não permite enviar informações ao banco de dados -->
                             <!------------------------------------- Onclick - ao clicar event junta com preventDefault -->
                                <a href = "/logout" class="nav-link" onclick="event.preventDefault();
                                /* (This) Esta (closest) Mais próximo formulario (submit) Enviar ao formulário LOGOUT */
                                    this.closest('form').submit();" 
                                > SAIR
                                </a>
                            </form>
                        </li>
                        <!-- Fim de autenticação -->
                        @endauth
                        
                        <!-- Convidado -->
                        @guest
                        <li class="nav-item">
                            <a href = "/login" class = "nav-link"> ENTRAR</a>
                        </li>
                        <li class="nav-item">
                            <a href = "/register" class = "nav-link"> CADASTRAR</a>
                        </li>
                        <!-- Fim de convidado -->
                        @endguest
                    </ul>
<!-- -->
                    

<!-- -->
                </div>
            </nav>
        </header>
        <main>
            <div class= "container-fluid">
                <div class= "row">
                    @if(session('msg'))
                        <p class="msg">{{session('msg')}}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
<?php
        $woeid = '26795065'; // BRXX0198 CID da sua cidade, encontre a sua em http://hgbrasil.com/weather https://api.hgbrasil.com/weather?woeid=26795065

$dados = json_decode(file_get_contents('http://api.hgbrasil.com/weather/?woeid='.$woeid.'&format=json'), true); // Recebe os dados da API

?>
<div class = "do_tempo">
    <hr>
    <div class = "cond">
    <h1>Condições do Tempo</h1>
        <?php echo $dados['results']['city']; ?> <?php echo $dados['results']['temp']; ?> ºC<br>
    <?php echo $dados['results']['description']; ?><br>
    Nascer do Sol: <?php echo $dados['results']['sunrise']; ?> - Pôr do Sol: <?php echo $dados['results']['sunset']; ?><br>
    Velocidade do vento: <?php echo $dados['results']['wind_speedy']; ?><br>
    <img src="/imagens/<?php echo $dados['results']['img_id']; ?>.PNG" class="imagem-do-tempo"><br>
    </div>
</div>





        <footer>
            <p class = "empresa">  Desenvolvedor | Marcelo Meneleu &copy; 2022</p>
        </footer>
        <script src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    </body>
</html>



