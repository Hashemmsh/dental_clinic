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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number',50)->unique();
            $table->string('invoice_date');
            $table->foreignId('patient_id');
            $table->foreignId('service_id');
            $table->float('laboratories')->nullable();
            $table->double('discount')->default(0);
            $table->string('status',50);
            $table->integer('value_status');
            $table->decimal('total',8,places:2);
            $table->double('paid');
            $table->double('remaining');
            $table->foreignId('user_id');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
