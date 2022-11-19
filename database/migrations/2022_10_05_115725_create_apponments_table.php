<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *`
     * @return void
     */
    public function up()
    {
        Schema::create('apponments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->foreignId('doctor_id');
            $table->string('date');
            $table->text('note')->nullable();
            $table->string('status');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('apponments');
    }
};
