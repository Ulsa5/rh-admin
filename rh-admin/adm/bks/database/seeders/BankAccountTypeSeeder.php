<?php

namespace Database\Seeders;

use App\Models\BankAccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankAccountType = new BankAccountType();
        $bankAccountType->account_type = "ahorro";
        $bankAccountType->save();

        $bankAccountType2 = new BankAccountType();
        $bankAccountType2->account_type = "monetaria";
        $bankAccountType2->save();
    }
}
