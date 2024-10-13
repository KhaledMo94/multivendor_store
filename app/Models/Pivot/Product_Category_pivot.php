<?php

namespace App\Models\Pivot;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Product_Category_pivot extends Pivot
{
    use HasFactory;

    protected $table = 'category_product';
}
