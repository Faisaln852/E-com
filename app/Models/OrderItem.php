<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'id',
        'order_id',
        'prod_id',
        'price',
        'qty',
    ];
    public function products(): BelongsTo  // products not product become it will confuse with the other product name ralation with cart
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
