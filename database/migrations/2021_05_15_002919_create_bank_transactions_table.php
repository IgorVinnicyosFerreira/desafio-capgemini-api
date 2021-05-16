<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("current_accounts_id");
            $table->decimal("value", 15, 2)->nullable();
            $table->decimal("balance_before_transaction", 15, 2)->nullable();
            $table->smallInteger("transaction_type");
            $table->timestamps();

            $table->foreign("current_accounts_id")->references("id")->on("current_accounts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_transactions');
    }
}
