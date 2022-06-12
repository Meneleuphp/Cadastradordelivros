<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// usando diretório para chamar Event.
use App\Models\Event; // Esse é o model o qual foi instanciado lá embaixo através de uma classe //
use App\Models\user;

class EventController extends Controller
{
    public function index(){
    // variável $search recebe solicitação em search em pesquisar //
        $search = request('search');
        
        // Se houver uma pesquisa // 
        if($search){
            //variável $events recebe Events onde array title preferencialmente ou todos dele para frente ou tras atenderem a busca//
            $events = Event::where([
                ['title', 'like', '%'.$search. '%']
            ])->get();
   
        // Se não //
        } else {
             //Chamando todos os eventos da tabela events.
            $events = Event::all();
        }
        // retornando na view e passando os eventos para view.
        return view('welcome',['events'=>$events, 'search' => $search]);   
    }


public function create(){
    return view('events.create');
}

public function store(Request $request){
    
        $event = New Event; //A classe do model está sendo instanciada //

        $event->autor = $request->autor;
        $event->description = $request->description;
        $event->data = $request->data;
        $event->title = $request->title;
        $event->num_paginas = $request->num_paginas;
    

        // Upload de imagem
        
        // Se variável request têm arquivo IMAGE e variável request é arquivo imagem, é válido.
        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            //Variável request imagem recebe variável request
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")).".". $extension;

            //Enviando a imagem para a pasta dentro do projeto
            $requestImage->move(public_path('imagem/events'), $imageName);

            //$vent referencia image igual a variável imageName
            $event->image = $imageName;


        }
        // User recebe autenticação e referencia user//
        $user = auth()->user();
        // Variável event referencia user_id e recebe variável user e referencia id //
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Livro Cadastrado com Sucesso!'); /* With significa com */
        
    }

    public function show ($id){

        $event = Event::findOrFail($id); /* findOrFail significa encontrar ou falhar */
        
        /* Owner significa proprietário user referencia onde id variável event referencia user_id o primeiro para array */
        $eventOwner = User::where('id', $event->user_id) -> first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);

    }

    public function dashboard() {
        
        /*Usuário autenticado referenciado em user */
        $user = auth() -> user();
        
        /*Retornando os eventos do usuário */
        $events  = $user -> events;

        /*Retornando a view events.dashboard e o array onde constam os eventos */
        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id){

        Event::FindOrFAil($id)->delete();

        return redirect('/dashboard')->with('msg', 'Registro de livro excluído com sucesso!');
    }


    public function edit($id){

        $event = Event::FindOrFail($id);


        return view('events.edit', ['event' => $event]);
    }


    public function update(Request $request) {
        Event::findorFail($request->id)->update($request->all());
        return redirect('/dashboard')->with('msg', 'Edição realizada com sucesso!');
        }


}


 





