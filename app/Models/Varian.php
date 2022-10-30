<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'sku', 'price','id_product'
    ];
    protected $table = "varian";

}
