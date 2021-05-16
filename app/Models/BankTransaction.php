<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    const SHOW_BALANCE_TRANSACTION = 1;
    const DEPOSIT_TRANSACTION = 2;
    const WITHDRAWAL_TRANSACTION = 3;

    protected $fillable = [
        "current_accounts_id",
        "value",
        "balance_before_transaction",
        "transaction_type"
    ];

    public function account()
    {
        return $this->belongsTo(CurrentAccount::class, "current_accounts_id");
    }
}
