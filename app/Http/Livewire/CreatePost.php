<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    #con el $open se controla el modal de livewire abierto o close
    public $title; 
    public $content, $image ; //configurar en filesystem local, tambien en los seeders y en el factory de post
                                //tambien se debe crear un acceso directo en el public
                            //image crear acceso directo php artisan storage:link

    //en el array se escuchan el evento declarado en el $this->emit('render') osea el mismo nombre
    
    #CON ESTAS REGLAS NO PERMITIMOS QUE CREEN DATOS VACIOS
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:3000',
    ];

    public function save(){
        $this->validate();
        $image = $this->image->store('public/posts');
        
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,	
        ]);
        //una vez guardado los datos se limpian los campos para que no se vuelvan a cargar
        $this->reset(['title', 'content', 'image']);
        //emitiendo un evento para que al guardar me refresque los datos, cualquier componente puede escucharlo.
        // $this->emit('show-posts.render');
        //con el metodo emitTo() se puede emitir un evento a un componente especifico, apuntar a la vista en /livewire
        $this->emitTo( 'show-posts' , 'show-posts.render');

        //emitiendo para el swit alert
        $this->emit('alert', 'El post se creo con exito');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
