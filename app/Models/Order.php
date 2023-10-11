<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function dishes(){
        return $this->belongsToMany(Dish::class);
    }

    protected $fillable=[
        'name',
        'last_name',
        'phone_number',
        'email',
        'address',
        'status',
        'total_price'
    ];
}
