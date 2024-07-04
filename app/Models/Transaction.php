<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status',
        'amount',
        'payment_type',
        'transaction_time',
    ];

     // Default sorting order: newest first
     protected $casts = [
        'transaction_time' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        // Order by transaction_time in descending order by default
        static::addGlobalScope('order', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->orderBy('transaction_time', 'desc');
        });
    }
}
