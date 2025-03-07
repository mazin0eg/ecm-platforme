<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Fillable columns
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        // other fields as needed
    ];
}