<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    use SoftDeletes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('credits', function (Blueprint $table) {
            $table->id();

            $table->text('user_id');
            $table->timestamp('expired_at')->nullable();
            $table->integer('amount');
            $table->integer('reminded_amount');
            $table->integer('used_count');
            $table->longText('description');
            $table->unsignedBigInteger('reference_type');
            $table->unsignedBigInteger('reference_id');

            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
