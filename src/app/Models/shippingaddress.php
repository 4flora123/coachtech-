<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shippingaddress extends Model
{
    use HasFactory;

    protected $table = 'shipping_addresses';

    /**
     * 代入可能な属性
     */
    protected $fillable = [
        'user_id',
        'shipping_name',
        'shipping_postal',
        'shipping_address',
        'shipping_building',
    ];

    /**
     * リレーション: ユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
