<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order_Adress extends Model
{
    use HasFactory , Notifiable;

    protected $table = 'order_adresses';

    protected $fillable = [
        'order_id','type','first_name','last_name',
        'mail','phone','street_address','city','country',
        'state','postal_code',
    ];

    public $timestamps = false;

}
