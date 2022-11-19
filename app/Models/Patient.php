<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable=[
            'name' ,
            'age',
            'gender',
            'phone',
            'address',
            'image',
            'note',
            'doctor_id',
            'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id')->withDefault();

    }

    public function apponment()
    {
        return $this->hasMany(Apponment::class);
    }
    public function medical_bill()
    {
        return $this->hasMany(Medical_bill::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

}
