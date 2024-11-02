<?php

namespace App\Notifications\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotificationsToAdmins extends Notification
{
    use Queueable;

    public $order;
    public $addr;
    /**
     * Create a new notification instance.
     */
    public function __construct($order, $addr)
    {
        $this->order = $order;
        $this->addr = $addr;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'items'                 =>$this->order,
            'billing'               =>$this->addr['addr']['billing'],
            'shipping'               =>$this->addr['addr']['shipping'],
        ];
    }
}
