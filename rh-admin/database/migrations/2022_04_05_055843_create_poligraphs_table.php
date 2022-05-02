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
        Schema::create('poligraphs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('result',150);
            $table->string('comment',250);
            $table->string('poligrapher',150);

            $table->unsignedBigInteger('employee_id');

            $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('poligraph_type_id');

            $table->foreign('poligraph_type_id')
                    ->references('id')->on('poligraph_types')
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
        Schema::dropIfExists('poligraphs');
    }
};
