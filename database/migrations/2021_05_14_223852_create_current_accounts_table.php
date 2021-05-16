<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_accounts', function (Blueprint $table) {
            $table->id();
            $table->decimal("balance", 15, 2)->default(0);
            $table->string("number", 13);
            $table->string("verification_digit", 2);
            $table->string("owner", 70);
            $table->string("document_number", 14);
            $table->string("password");
            $table->unsignedBigInteger("agencies_number");
            $table->timestamps();

            $table->foreign("agencies_number")->references("number")->on("agencies");
            $table->index(["agencies_number", "number", "verification_digit"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('current_accounts');
    }
}
