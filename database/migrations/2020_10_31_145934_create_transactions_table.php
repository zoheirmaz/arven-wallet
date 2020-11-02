<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('payment_id');
            $table->integer('status');
            $table->unsignedBigInteger('gateway')->nullable();
            $table->string('transaction_id');
            $table->text('reference_id')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->integer('gateway_status')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('gateway')->references('id')->on('enumerations');
            $table->foreign('payment_id')->references('id')->on('payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
