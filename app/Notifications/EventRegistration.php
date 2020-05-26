<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EventRegistration extends Notification
{
    use Queueable;

    protected $user;

    protected $password;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $password = false)
    {
        $this->user = $user;
        $this->password = $password;
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
        $user = $this->user;
        $profile = $this->user->profile;
        $event = $user->events()->latest()->first();

        if($this->password == false)
        {
            return (new MailMessage)
                ->subject('Registration for ' . Str::ucfirst($event->title))
                ->greeting('Dear ' . Str::ucfirst($profile->title) . ' ' .Str::ucfirst($profile->name))
                ->line('You registered for ' . Str::ucfirst($event->title) . ' ' . 'Date: ' . $event->start_date->toDayDateTimeString() )
                ->action('Event Site', url('/'))
                ->line('Thank you for registering for this special Conference!');
        }else{
            return (new MailMessage)
                ->subject('Registration for ' . Str::ucfirst($event->title))
                ->greeting('Dear ' . Str::ucfirst($profile->title) . ' ' .Str::ucfirst($profile->name))
                ->line('You registered for ' . Str::ucfirst($event->title) . ' ' . 'Date: ' . $event->start_date->toDayDateTimeString() )
                ->line("Login Details")
                ->line("Email: $user->email | Password: $this->password")
                ->action('Event Site', url('/'))
                ->line('Thank you for registering for this special Conference!');
        }

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
