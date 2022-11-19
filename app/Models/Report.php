<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    
    public function medical_bill()
    {
        return $this->belongsTo(Medical_bill::class)->withDefault();
    }
    public function apponment()
    {
        return $this->belongsTo(Apponment::class)->withDefault();;
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();;
    }



}
