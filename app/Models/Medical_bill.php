<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medical_bill extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'patient_id',
        'tooth',
        'prescription',
        'doctor_id',
        'image',
        'medicine_id',
        'service_id',
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
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function medicine()
    {
        return $this->belongsTo(Medicine::class)->withDefault();
    }
    public function report()
    {
        return $this->hasMany(Report::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class)->withDefault();
    }
}
