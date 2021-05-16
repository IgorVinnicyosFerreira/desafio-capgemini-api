<?php

namespace App\Http\Resources;

use App\Models\BankTransaction;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BankTransactionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->map(function ($transaction) {

            $description = "";
            if ($transaction->transaction_type == BankTransaction::SHOW_BALANCE_TRANSACTION) {
                $description = "Consulta de saldo em conta corrente";
            } else if ($transaction->transaction_type == BankTransaction::DEPOSIT_TRANSACTION) {
                $description = "Depósito em conta corrente";
            } else if ($transaction->transaction_type == BankTransaction::WITHDRAWAL_TRANSACTION) {
                $description = "Saque em conta corrente";
            }

            return [
                "value"         =>  $transaction->value,
                "description"   =>  $description,
                "date"          =>  $transaction->created_at
            ];
        });
    }
}
