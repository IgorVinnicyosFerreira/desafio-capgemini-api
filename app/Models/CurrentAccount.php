<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CurrentAccount extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $hidden = [
        'password',
    ];

    protected $fillable = [
        "balance",
    ];


    public function agency()
    {
        return $this->belongsTo(Agency::class, "agencies_number");
    }

    public function transactions()
    {
        return $this->hasMany(BankTransaction::class);
    }
}
