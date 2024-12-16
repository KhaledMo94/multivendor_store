<?php

namespace App\Models;

use App\Models\Front\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderAdress extends Model
{
    use HasFactory , Notifiable;

    protected $table = 'order_adresses';

    protected $fillable = [
        'order_id','type','first_name','last_name',
        'mail','phone','street_address','city','country',
        'state','postal_code',
    ];

    public $timestamps = false;

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function routeNotificationForEmail(){
        return $this->mail;
    }

}
