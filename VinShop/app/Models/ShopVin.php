<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ShopVin extends Model
{
    use HasFactory;
    protected $table = 'shop_vins';
    protected $guarded = false;
}
