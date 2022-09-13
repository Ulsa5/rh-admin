<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);

            $table->unsignedBigInteger('capacitation_id');

            $table->foreign('capacitation_id')
                    ->references('id')->on('capacitations')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacitation_types');
    }
};
