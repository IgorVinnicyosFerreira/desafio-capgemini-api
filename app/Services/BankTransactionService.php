<?php

namespace App\Services;

use App\Models\BankTransaction;
use App\Services\Interfaces\BankTransactionInterface;

class BankTransactionService implements BankTransactionInterface
{
    public function register($transactionType, $accountId, $value = null, $balanceBeforeTransaction = null)
    {
        return BankTransaction::create([
            "current_accounts_id"           =>  $accountId,
            "value"                         =>  $value,
            "balance_before_transaction"    =>  $balanceBeforeTransaction,
            "transaction_type"              =>  $transactionType
        ]);
    }

    public function list($accountId)
    {
        return BankTransaction::where([
            ["current_accounts_id", "=", $accountId]
        ])->orderByDesc('id')->limit(15)->get();
    }
}
