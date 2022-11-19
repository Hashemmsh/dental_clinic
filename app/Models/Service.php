<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Service extends Model
{
    use HasFactory , softDeletes;

     protected $fillable=['service','description','price','user_id'];

     public function user()
     {
        return $this->belongsTo(User::class)->withDefault();
     }
     public function invoice()
     {
        return $this->hasMany(Invoice::class);
     }
     public function medical_bill()
     {
        return $this->hasMany(Medical_bill::class);
     }
}
