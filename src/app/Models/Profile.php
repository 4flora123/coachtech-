<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * プロパティを一括割り当て可能にする。
     */
    protected $fillable = [
        'user_id',
        'profile_name',
        'postal',
        'address',
        'payment_info',
        'building',
        'profile_image_url',
    ];

    /**
     * ユーザーとのリレーションを定義
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
