<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    // 代入可能なカラム（ホワイトリスト）を指定
    protected $fillable = [
        'merchandise_name',
        'merchandise_img',
        'brand',
        'price',
        'explanation',
        'categories',
        'condition',
        'comment',
    ];
}
