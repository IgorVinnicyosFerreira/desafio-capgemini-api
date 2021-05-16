<?php

use App\Models\CurrentAccount;
use Illuminate\Database\Seeder;

class PopulateAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrentAccount::insert([
            [
                "balance"               =>  10140.55,
                "number"                =>  "005465",
                "verification_digit"    =>  "5",
                "owner"                 =>  "Igor V S Ferreira",
                "document_number"       =>  "44527612085",
                "password"              =>  bcrypt("457080"),
                "agencies_number"       =>  "1225"
            ],
            [
                "balance"               =>  3200.00,
                "number"                => "003419",
                "verification_digit"    => "2",
                "owner"                 =>  "Iasmin Luuana Mariano",
                "document_number"       =>  "60105838020",
                "password"              =>  bcrypt("126820"),
                "agencies_number"       =>  "1225"
            ],
            [
                "balance"               =>  7050.00,
                "number"                => "113518",
                "verification_digit"    => "7",
                "owner"                 =>  "Osvaldo F S Ferreira",
                "document_number"       =>  "73932025067",
                "password"              =>  bcrypt("106830"),
                "agencies_number"       =>  "5423"
            ],
        ]);
    }
}
