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
        Schema::create('poligraph_types', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);

            $table->unsignedBigInteger('poligraph_id');

            $table->foreign('poligraph_id')
                    ->references('id')->on('poligraphs')
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
        Schema::dropIfExists('poligraph_types');
    }
};
