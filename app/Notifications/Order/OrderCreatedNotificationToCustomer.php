<?php

namespace App\Notifications\Order;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotificationToCustomer extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $addr , $store , $order;
    public function __construct($addr , $store_id , $order)
    {
        $this->addr = $addr;
        $this->store = Store::where('id',$store_id)->first(['id','name',]);
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail' , 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("Your Order Has Been Created")
                    ->line("Dear {$this->addr['billing']['first_name']}")
                    ->greeting('Hope you`re doing well')
                    ->line("your Order From {$this->store->name} has been created")
                    ->line("to {$this->addr['shipping']['street_address']}")
                    ->line("We `ll call back you when payment be verified");

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'store_id'                      =>$this->store->id,
            'store_name'                    =>$this->store->name,
            'order'                         =>$this->order,
            'shipping_address'              =>$this->addr['shipping']['street_address'],
            'billing_mail'                  =>$this->addr['billing']['mail'],
        ];
    }
}
