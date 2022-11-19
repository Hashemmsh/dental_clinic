<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Apility extends Model
{
    use HasFactory , softDeletes;

     protected $guarded=[];
     public function roles()
     {
        return $this->belongsToMany(Role::class);
     }
}
