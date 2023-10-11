<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function types(){
        return $this->belongsToMany(Type::class);
    }

    public function dishes(){
        return $this->hasMany(Dish::class);
    }
    
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'thumb',
        'p_iva',
        'user_id'
    ];

}
