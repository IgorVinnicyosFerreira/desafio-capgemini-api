<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BankTransactionCollection;
use App\Services\Interfaces\BankTransactionInterface;

class BankTransactionController extends Controller
{
    private $service;

    public function __construct(BankTransactionInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $accountId = Auth()->user()->id;
        $transactions = $this->service->list($accountId);

        return new BankTransactionCollection($transactions);
    }
}
