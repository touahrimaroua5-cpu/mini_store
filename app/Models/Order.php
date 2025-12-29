<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     use HasFactory;

    protected $fillable = ['client_id'];

    // علاقة مع Client
    public function client(){
        return $this->belongsTo(Client::class);
    }

    // علاقة مع OrderItems
    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
