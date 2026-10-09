<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ActivateUserNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // $link = url("/activation/{$this->user->email_verification_token}?email=" . urlencode($this->email));
        $link = url("/activation/{$this->user->email_verification_token}");
        return (new MailMessage)
            ->line('Please click the button below to activate your account.')
            ->action('Activate Account', $link) 
            ->line('Thank you for using our application!');
    }
}