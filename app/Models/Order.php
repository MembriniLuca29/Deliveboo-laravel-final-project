<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dishes(){
        return $this->belongsToMany(Dish::class);
    }

    protected $fillable=[
        'total_price',
        'address',
        'address_number',
        'user_id',
    ];
}
