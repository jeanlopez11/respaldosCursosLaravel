<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
// use GluzzleHttp\Client as Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function dashboard()
    {
        $posts = Post::all();
        return view('dashboard');
    }
    // TRABAJANDO CON NOTIFICACIONES
    // 1. CREAMOS UN MODELO DE MENSAJE CON LOS CAMPOS DE LA TABLA QUE VAN
    // 2. CREAMOS UNA VISTA PARA EL FORMULARIO DE MENSAJES  AASUNTO, BODY Y DESTINATARIO
    
    public function notificaciones()
    {
        $posts = Post::all();
        $users = User::all();
        return view('notificaciones', compact('users'));
    }











    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        return view('posts.store');
    }
    public function show($post)
    {
        return view('posts.show', compact('post'));
    }
    public function edit($post)
    {
        $posts = Post::find($post);
        return view('posts.edit',compact('posts'));
    }

    public function update(Request $request, Post $post)
    {
        // dd($post);
        $post->update($request->all());
        return redirect()->route('posts.index')
            ->with('success', 'Registros actualizados.');
    }
    public function destroy($post)
    {
        return view('posts.destroy');
    }
    public function GetgluzzeRespaldo(){
    
        // $client = Http::withBasicAuth('user', 'pass')->get('https://api.github.com/user');
        $clientes = Http::get('https://pokeapi.co/api/v2/pokemon/ditto');
        // $clientes = ($clientes->body());
        #para convertir en objeto json
        
        $clientes = json_decode($clientes->Body());
        // dd($clientes->abilities[0]->ability->name);
        $habilidades = $clientes->abilities;

        // PARA AUTENTICACION BASICA
        //  Http::withBasicAuth('taylor@laravel.com', 'secret')

        //CLIENTE CONECTANDOSE A LA API CON PARAMETROS
        // Http::withUrlParameters([
            // 'endpoint' => 'https://laravel.com',
            // 'page' => 'docs',
            // 'version' => '9.x',
            // 'topic' => 'validation',
        // ])->get('{+endpoint}/{page}/{version}/{topic}');
        
        return view('gluzze', compact('clientes'));
    }
    public function Getgluzze(){
        $epam = 'https://pagos-qa.altura.services/ws-pago-linea/webresources/api';
        $clientes = Http::withBasicAuth('EPAM_PAGO_LINEA', 'NWRQjSMEnjY=')
        ->get(''.$epam.'/consultaAuxiliar?idEmpresa=EPAM&usuarioCobro=EXTERNO&identificacion=1391829884001');
        
        // $clientes = ($clientes->body());
        #para convertir en objeto json
        
        // $clientes = json_decode($clientes->Body());
        // dd($clientes->abilities[0]->ability->name);
        // $habilidades = $clientes->abilities;

        // PARA AUTENTICACION BASICA
        //  Http::withBasicAuth('taylor@laravel.com', 'secret')
        $tipoConsulta = 'consultaAuxiliar';
        $getConsultaAuxiliar = Http::withBasicAuth('EPAM_PAGO_LINEA', 'NWRQjSMEnjY=')
        ->withUrlParameters([
            'endpoint' => 'https://pagos-qa.altura.services/ws-pago-linea/webresources/api',
            'idEmpresa' => 'EPAM',
            'usuarioCobro' => 'EXTERNO',
            'identificacion' =>'1391829884001',
            'tipoConsulta' =>'consultaAuxiliar',
        ])->get('/{+endpoint}/{+tipoConsulta}?idEmpresa={+idEmpresa}&usuarioCobro={+usuarioCobro}&identificacion={+identificacion}');
        echo($getConsultaAuxiliar);

        //CLIENTE CONECTANDOSE A LA API CON PARAMETROS
        // Http::withUrlParameters([
            // 'endpoint' => 'https://laravel.com',
            // 'page' => 'docs',
            // 'version' => '9.x',
            // 'topic' => 'validation',
        // ])->get('{+endpoint}/{page}/{version}/{topic}');
        

        return view('gluzze', compact('clientes'));
    }

}
