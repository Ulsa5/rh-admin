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
        Schema::create('capacitations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('instructor');
            $table->string('comment',250)->nullable();

            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('capacitation_type_id');

            $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('capacitation_type_id')
                    ->references('id')->on('capacitation_types')
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
        Schema::dropIfExists('capacitations');
    }
};
