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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            
            $table->string('name',100);
            $table->string('dpi',13);
            $table->date('admission_date');
            $table->string('carnet',15);
            $table->date('carnet_expiration');
            $table->string('telephone',10);
            $table->string('nit',15);
            $table->string('irtra',25);
            $table->string('educational_level',100);
            $table->string('email',100);
            $table->date('birthday');
            $table->string('children',2);
            $table->string('address',250);
            $table->string('bank_account_number',50);

            $table->unsignedBigInteger('blood_id');

            $table->foreign('blood_id')
                    ->references('id')->on('bloods')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('gender_id');

            $table->foreign('gender_id')
                    ->references('id')->on('genders')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('civil_status_id');

            $table->foreign('civil_status_id')
                    ->references('id')->on('civil_statuses')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('bank_id');

            $table->foreign('bank_id')
                    ->references('id')->on('banks')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('bank_account_type_id');

            $table->foreign('bank_account_type_id')
            ->references('id')->on('bank_account_types')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('igss_afilliation_id');

            $table->foreign('igss_afilliation_id')
            ->references('id')->on('igss_afilliations')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('company_id');

            $table->foreign('company_id')
            ->references('id')->on('companies')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('job_id');

            $table->foreign('job_id')
            ->references('id')->on('jobs')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('project_id');

            $table->foreign('project_id')
            ->references('id')->on('projects')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('insurance_id');

            $table->foreign('insurance_id')
            ->references('id')->on('insurances')
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
        Schema::dropIfExists('employees');
    }
};
