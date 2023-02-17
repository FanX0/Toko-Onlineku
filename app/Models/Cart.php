<?php

namespace App\Models;

use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'products_id',
    ];
    //1 item card punya 1 produk ga mungkin lebih
    public function product()
    
    {
         return $this->hasOne(Product::class, 'id', 'products_id');
    }
    // usernya siapa
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
