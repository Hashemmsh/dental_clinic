<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model
{
    use HasFactory , softDeletes;

     protected $fillable=[
        'invoice_number',
        'invoice_date',
        'patient_id',
        'service_id',
        'service->price',
        'laboratories',
        'discount',
        'status',
        'value_status',
        'total',
        'paid',
        'remaining',
        'user_id'
    ];

     public function patient()
     {
        return $this->belongsTo(Patient::class)->withDefault();

     }
     public function service()
     {
        return $this->belongsTo(Service::class)->withDefault();

     }
     public function user()
     {
        return $this->belongsTo(User::class)->withDefault();

     }
     public function invoice_de()
     {
        return $this->hasMany(Invoice_details::class);

     }
}
