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
        Schema::create('company_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('company_name');
            $table->string('product');
            $table->date('date');
            $table->integer('quantity')->default(1);
            $table->double('price');
            $table->double('total');
            $table->string('status',50);
            $table->integer('value_status');
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
        Schema::dropIfExists('company_invoices');
    }
};
