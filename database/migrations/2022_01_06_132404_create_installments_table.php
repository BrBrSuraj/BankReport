<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financial_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('fiscalYear');
            $table->string('sector');
            $table->decimal('amount', 10, 2);
            $table->decimal('paidIntrest')->nullable();
            $table->date('installmentDate');
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
        Schema::dropIfExists('installments');
    }
}