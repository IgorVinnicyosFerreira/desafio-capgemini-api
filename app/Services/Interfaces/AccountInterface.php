<?php

namespace App\Services\Interfaces;

interface AccountInterface
{
    public function getBalanceByAccountId($id);
    public function deposit($id, $value, $password);
    public function withdraw($id, $value, $password);
}
