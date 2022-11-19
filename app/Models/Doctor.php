<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable=[
        'name',
        'gender',
        'address',
        'phone',
        'email',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
    public function apponment()
    {
        return $this->hasMany(Apponment::class);
    }
    public function medical_bill()
    {
        return $this->hasMany(Medical_bill::class);
    }
}
