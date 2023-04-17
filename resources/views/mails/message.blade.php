{{-- este componente mail:message siempre debe extender es la base que contiene el diseñó de todo el mensaje --}}
{{-- markdowm resaltado con # --}}
{{-- ojo siempre deben ir pegados a la derecha cualquier disenó o componente, si no nofunciona --}}
@component('mail::message')
    # Hola Coders
    Para leer el mensaje, haz click en el boton
    
@component('mail::panel')
{{ $message->body }}
@endcomponent
    
@component('mail::button', ['url' => route('messages.show', $message)])
Ver mensaje
@endcomponent

Hasta luego!

Gracias,<br>
# {{ config('app.name') }}

@component('mail::subcopy')
Si tienes problemas para hacer click en el boton, copia y pega la siguiente URL en tu navegador:
<a href="{{ route('messages.show', $message) }}"> {{ route('messages.show', $message) }} </a>
@endcomponent

@endcomponent
