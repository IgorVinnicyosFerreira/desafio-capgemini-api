<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\DepositRequest;
use App\Http\Requests\V1\WithdrawRequest;
use App\Services\CurrentAccountService;
use App\Services\Interfaces\CurrentAccountInterface;
use Illuminate\Support\Facades\Auth;

class CurrentAccountController extends Controller
{
    /** @var CurrentAccountService */
    private $service;

    public function __construct(CurrentAccountInterface $service)
    {
        $this->service = $service;
    }

    public function getBalance()
    {
        $accountId = Auth()->user()->id;
        $balance = $this->service->getBalanceByAccountId($accountId);

        return response()->json($balance);
    }

    public function deposit(DepositRequest $request)
    {
        $accountId = Auth()->user()->id;
        $data = $request->validated();

        $result = $this->service->deposit($accountId, $data["value"], $data["password"]);

        $httpStatus = 200;
        if (isset($result["error"])) {
            $httpStatus = 400;
        }

        return response()->json($result, $httpStatus);
    }

    public function withdraw(WithdrawRequest $request)
    {
        $accountId = Auth()->user()->id;
        $data = $request->validated();

        $result = $this->service->withdraw($accountId, $data["value"], $data["password"]);

        $httpStatus = 200;
        if (isset($result["error"])) {
            $httpStatus = 400;
        }

        return response()->json($result, $httpStatus);
    }
}
