<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id'
    ];

    // كل Product كتتعلق ب Category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // optional: كل Product عندو بزاف ديال OrderItems
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
