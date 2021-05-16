<?php

namespace App\Services\Interfaces;

interface BankTransactionInterface
{
    public function register($transactionType, $accountId, $value = null, $balanceBeforeTransaction = null);
    public function list($accountId);
}
