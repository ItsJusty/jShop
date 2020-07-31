<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ContactFormNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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

         // if (static::$toMailCallback) {
         //     return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
         // }

         return (new MailMessage)
             ->subject('We hebben een typert op mijn formulier')
             ->greeting('Hallo klantenservice makkers')
             ->line('We hebben een berichtje gekregen via het formulier van '. $this->data['first_name'])
             ->line(new HtmlString('Het gaat om een vraag in de categorie: <strong>' . $this->data['subject'] . '</strong>'))
             ->line('En de vraag luidt alsvolgt,')
             ->line($this->data['message'])
             ->line(new HtmlString('Deze persoon of robot vertelde dat je kan terugmailen met mail: <strong>' . $this->data['email'] . '</strong>'))
             ->salutation("\r\n\r\n Met vriendelijke groet,  \r\n de website");
             // ->to($this->data['email']);
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
