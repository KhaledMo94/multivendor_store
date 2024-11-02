<?php

namespace App\Notifications\Product;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductAlertNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $product;
    /**
     * Create a new notification instance.
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Action Needed To '.config('app.name'))
                    ->line("Dear {$notifiable->name}")
                    ->greeting("Hope you`re doing well.")
                    ->line("A New Order to product {$this->product->name}")
                    ->line("only availble {$this->product->stock}")
                    ->line("with sku : {$this->product->sku}")
                    ->action('Go to website', url('/login'))
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
            'product name'              =>$this->product->name,
            'username'                  =>$notifiable->name,
            'stock'                     =>$this->product->stock,
            'sku'                       =>$this->product->sku,
        ];
    }
}
