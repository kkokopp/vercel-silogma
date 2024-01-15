<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $password;

    public function __construct($password)
    {
        //
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->markdown('emails.password_notification', ['password' => $this->password]);
                    // ->line('Akun anda telah berhasil dibuat')
                    // ->line('Password anda adalah : '.$this->password)
                    // ->line('Silahkan login dengan menggunakan email yang anda daftarkan dan password tersebut')
                    // ->action('Login', url('/login'))
                    // ->line('Terimakasih');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
