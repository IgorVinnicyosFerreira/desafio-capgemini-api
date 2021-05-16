<?php

namespace App\Services;

use App\Models\BankTransaction;
use App\Models\CurrentAccount;
use App\Services\Interfaces\{AccountInterface, BankTransactionInterface, CurrentAccountInterface};
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CurrentAccountService implements AccountInterface, CurrentAccountInterface
{
    private $transactionService;

    public function __construct(BankTransactionInterface $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function getBalanceByAccountId($id)
    {
        $balance = CurrentAccount::find($id, ["balance"]);
        $this->transactionService->register(BankTransaction::SHOW_BALANCE_TRANSACTION, $id, $balance["balance"]);

        return $balance;
    }

    public function deposit($id, $value, $password)
    {
        try {
            $account = CurrentAccount::find($id);
            if (!Hash::check($password, $account->password)) {
                return ["error"  => "Senha inválida"];
            }

            $currentBalance = $account->balance;
            $balance = $currentBalance + $value;

            DB::beginTransaction();
            $account->update(["balance" =>  $balance]);
            $this->transactionService
                ->register(BankTransaction::DEPOSIT_TRANSACTION, $id, $value, $currentBalance);
            DB::commit();

            return ["balance" => round($balance, 2)];
        } catch (Exception $exc) {
            DB::rollBack();
            throw $exc;
        }
    }

    public function withdraw($id, $value, $password)
    {
        try {
            $account = CurrentAccount::find($id);
            if (!Hash::check($password, $account->password)) {
                return ["error"  => "Senha inválida"];
            }

            $currentBalance = $account->balance;
            $balance = $account->balance - $value;

            if ($balance < 0) {
                return ["error"  => "Saldo insuficiente"];
            }

            DB::beginTransaction();
            $account->update(["balance" =>  $balance]);
            $this->transactionService
                ->register(BankTransaction::WITHDRAWAL_TRANSACTION, $id, $value, $currentBalance);
            DB::commit();

            return ["balance" => round($balance, 2)];
        } catch (Exception $exc) {
            DB::rollBack();
            throw $exc;
        }
    }
}
