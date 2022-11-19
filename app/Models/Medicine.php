<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'name',
        'indictions',
        'symptoms',
        'details',
        'doctor_id'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class)->withDefault();
    }
    public function medical_bill()
    {
        return $this->hasMany(Medical_bill::class);
    }
}

