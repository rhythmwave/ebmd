<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'id',
        'order_id',
        'order_detail_type_id',
        'attachment',
        'code',
        'desccription',
        'condition',
        'xs1',
        'xn1',
        'xd1',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        // 'created_at' => 'timestamp',
    ];
}
