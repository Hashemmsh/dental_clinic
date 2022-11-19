<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }

    public function  apponment()
    {
       return $this->hasMany(Apponment::class);
    }

    public function medicine()
    {
        return $this->hasMany(Medicine::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function medical_bill()
    {
        return $this->hasMany(Medical_bill::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function invoice_details()
    {
        return $this->hasMany(Invoice_details::class);
    }

    public function company_invoice()
    {
        return $this->hasMany(Company_invoice::class);
    }

    public function company_invoice_details()
    {
        return $this->hasMany(Company_invoice_details::class);
    }

    public function expense()
    {
        return  $this->hasMany(Expense::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class)->withDefault();
    }
}
