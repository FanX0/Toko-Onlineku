<?php

namespace App\Models;

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
        return $this->hashOne(Product::class, 'products_id', 'id');
    }
    // usernya siapa
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
