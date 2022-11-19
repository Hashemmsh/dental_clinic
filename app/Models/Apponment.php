<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apponment extends Model
{
    use HasFactory,SoftDeletes;

        protected $fillable=[
        'patient_id',
        'doctor_id',
        'date',
        'note',
        'status',
        'user_id'

    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class)->withDefault();
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class)->withDefault();
    }
    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
