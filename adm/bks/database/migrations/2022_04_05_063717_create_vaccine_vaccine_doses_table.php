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
        Schema::create('vaccine_vaccine_doses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('vaccine_id');
            $table->unsignedBigInteger('vaccine_doses_id');

            $table->foreign('vaccine_id')
                    ->references('id')->on('vaccines')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('vaccine_doses_id')
            ->references('id')->on('vaccine_doses')
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
        Schema::dropIfExists('vaccine_vaccine_doses');
    }
};
