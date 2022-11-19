<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company_invoice extends Model
{
    use HasFactory , softDeletes;

     protected $fillable=[
        'invoice_number',
        'company_name',
        'product',
        'quantity',
        'price',
        'total',
        'status',
        'value_status',
        'date',
        'paid',
        'remaining',
        'user_id',
     ];



     public function user()
     {
        return $this->belongsTo(User::class)->withDefault();
     }
     public function company_invoice_details()
     {
        return $this->hasMany(Company_invoice_details::class);
     }
}
