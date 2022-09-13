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
        Schema::create('igss_afilliations', function (Blueprint $table) {
            $table->id();
            $table->string('number',25);
            $table->string('filial',25);
            
            $table->unsignedBigInteger('company_id');

            $table->foreign('company_id')
                    ->references('id')->on('companies')
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
        Schema::dropIfExists('igss_afilliations');
    }
};
