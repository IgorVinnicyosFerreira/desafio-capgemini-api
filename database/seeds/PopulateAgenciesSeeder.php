<?php

use App\Models\Agency;
use Illuminate\Database\Seeder;

class PopulateAgenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agency::insert([
            ["number"   =>  "1225", "name"  =>  "Agência Indianópolis"],
            ["number"   =>  "5423", "name"  =>  "Agência Nassau"],
        ]);
    }
}
