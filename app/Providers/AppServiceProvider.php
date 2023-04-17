<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        #pendiente no sirve
        // VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl){
        //     return (new MailMessage)
        //         ->subject('Verifica tu correo electrónico')
        //         ->line('Por favor, haz click en el botón de abajo para verificar tu correo electrónico.')
        //         ->action('Verificar correo electrónico', $verificationUrl)
        //         ->line('Si no creaste una cuenta, no es necesario realizar ninguna otra acción.');
        // }
    }
}
