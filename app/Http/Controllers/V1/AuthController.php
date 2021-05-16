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
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            /** @var CurrentAccount */
            $account = Auth::user();
            $token = $account->createToken("CAPGEMINI BANK", [])->plainTextToken;

            return response()->json([
                "token"     =>  $token,
                "account"   =>  $account
            ]);
        }

        return response()->json(["msg" => 'Dados bancários inválidos ou inexistentes'], 401);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([], 204);
    }
}
