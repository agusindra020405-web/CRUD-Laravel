<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Supaya bisa menyimpan data lewat OrderItem::create
    protected $fillable = [
        'order_id',
        'product_id',
        'price'
    ];

    // Relasi ke produk (agar bisa menampilkan nama barang di invoice)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
