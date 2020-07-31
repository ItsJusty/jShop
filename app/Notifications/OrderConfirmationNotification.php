<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toMail($notifiable)
     {
         $verificationUrl = $this->verificationUrl($notifiable);

         if (static::$toMailCallback) {
             return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
         }

         $ref = Str::random(8);

         return (new MailMessage)
             ->greeting('Hallo '.$notifiable->first_name)
             ->subject(Lang::get('We hebben je bestellig ontvangen!'))
             ->line(Lang::get('Je bestelling met referentie ' . $red . ' is succesvol ontvangen'))
             // ->action(Lang::get('Verifieer je email'), $verificationUrl)
             ->line(Lang::get('We houden je op de hoogte over het hele proces tot aan de aflevering :)'));
     }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
