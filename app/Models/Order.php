<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'id',
        'code',
        'applicant',
        'identity',
        'order_status_id',
        'order_type_id',
        'description',
        'xs1',
        'xn1',
        'xd1',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
    ];
}
