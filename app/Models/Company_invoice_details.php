<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company_invoice_details extends Model
{
    use HasFactory , softDeletes;

    protected $fillable=[
    'invoice_number',
    'id_company_invoice',
    'status','value_status',
    'user_id',
    'payment_date',
    'note',

];







    public function company_invoice()
    {
       return $this->belongsTo(Company_invoice::class)->withDefault();
    }
    public function user()
    {
       return $this->belongsTo(User::class)->withDefault();
    }
}
