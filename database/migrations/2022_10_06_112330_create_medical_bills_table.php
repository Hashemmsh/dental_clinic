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
        Schema::create('medical_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->integer('tooth');
            $table->foreignId('service_id');
            $table->string('prescription');
            $table->foreignId('doctor_id');
            $table->string('image');
            $table->foreignId('user_id');
            $table->foreignId('medicine_id');
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
        Schema::dropIfExists('medical_bills');
    }
};
