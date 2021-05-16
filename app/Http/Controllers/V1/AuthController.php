<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LoginRequest;
use App\Models\CurrentAccount;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = [
            "agencies_number"       =>  $request->get("agencies_number"),
            "number"                =>  $request->get("number"),
            "verification_digit"    =>  $request->get("verification_digit"),
            "password"              =>  $request->get("password"),
        ];

        if (Auth::attempt($credentials)) {
            /** @var CurrentAccount */
            $account = Auth::user();
            $token = "";

            if ($request->get("device", false)) {
                $token = $account->createToken("CAPGEMINI BANK", [])->plainTextToken;
            }

            return response()->json([
                "token"     =>  $token,
                "account"   =>  $account
            ]);
        }

        return response()->json(["msg" => 'Dados bancários inválidos ou inexistentes'], 401);
    }

    // only sanctum cookie mode
    public function logout()
    {
        Auth::guard('web')->logout();
        return response()->json([], 204);
    }
}
