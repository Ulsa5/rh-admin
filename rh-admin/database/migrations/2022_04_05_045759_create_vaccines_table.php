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
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->string('dosis_type',150);
            $table->date('dosis_date');
            $table->string('dosis_number',50);
            $table->string('dosis_comment',250)->nullable();

            $table->unsignedBigInteger('employee_id');

            $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('vaccines');
    }
};
