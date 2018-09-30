<?php

namespace App\Notifications;

use App\Permission;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPermission extends Notification
{
    use Queueable;
    private $permission;
    private $creator;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Permission $permission, User $creator)
    {
        $this->permission = $permission;
        $this->creator = $creator;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
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
            'message' => 'A new permission was created by ' . $this->creator->name,
            'action' => url(config('laraadmin.adminRoute') . '/permissions/' . $this->permission->id . '/edit')
        ];
    }
}
