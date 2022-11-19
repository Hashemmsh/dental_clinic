<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice_details extends Model
{
    use HasFactory , softDeletes;

     protected $fillable=[
        'id_invoice',
        'invoice_number',
        'status',
        'value_status',
        'payment_date',
        'note',
        'user_id',
    ];

     public function user()
     {
        return $this->belongsTo(User::class)->withDefault();
     }
     public function invoice()
     {
        return $this->belongsTo(Invoice::class)->withDefault();
     }
}
