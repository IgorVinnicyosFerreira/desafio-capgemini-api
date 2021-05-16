<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{

    public function accounts()
    {
        return $this->hasMany(CurrentAccount::class);
    }
}
