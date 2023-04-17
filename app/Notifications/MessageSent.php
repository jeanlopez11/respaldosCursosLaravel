<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
#shouldqueue es para que se ejecute en segundo plano (colas)
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
#con este comando implementamos shouldqueue para trabajos en segundo plano, puede consumir muchos recursos
#utilizar para trabajos pesados, como envio de correos masivos u otros
// class MessageSent extends Notification implements ShouldQueue
class MessageSent extends Notification 

{
    use Queueable;
    #PERSONALIZACION DE CORREO Y NOTIFICACIONES
    // public $message;
    // public function __construct($message)
    // {
    //     $this->message = $message;
    // }
    #hace lo mismo que arriba
    #ADICIONALMENTE, ESTA CLASE ES LLAMADA EN NUESTRO POST, LA CUAL TRAE LA INFORMACION DEL MENSAJE (TITLE, SUBJECT, BODY)
    public function __construct(public $message)
    {
    }
    public function via($notifiable)
    {
        return ['mail'];
        #ojo hay varios tipos de notificaciones, como database, broadcast, slack, nexmo, mail, etc
        #si utilizamos uno diferente debe estar el metodo toDatabase por ejemplo, como abajo con toMail
    }

    public function toMail($notifiable)
    {
        //para cambiar el diseñó de la notificacion, hay que publicar primero la plantilla
        return (new MailMessage)
                    ->subject('Tienes un nuevo mensaje') //titulo del mensaje que aparece en el correo
                    ->markdown('mails.message', [
                        #toda la informacion siempre se encuentra en la propiedad publica message, ya que arriba en el constructor lo definimos
                        'message' => $this->message
                    ]);
                    // ->greeting('Hola coders')
                    // ->line('Para leer tu mensaje has click en el boton')
                    // ->action('Ver Mensaje', route('messages.show', $this->message->id))
                    // ->line('Hasta Pronto');
    }

    public function toDatabase($notifiable)
    {
        return [
            #url donde me redeirige la notificacion
            'url' =>route('messages.show', $this->message->id),
            #mensaje que se muestra en la notificacion
            'message' => 'HAS RECIBIDO UN MENSAJE DE ' . User::find($this->message->from_user_id)->name,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
