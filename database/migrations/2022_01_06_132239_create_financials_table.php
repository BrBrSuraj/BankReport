<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('loan_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('fiscalYear');
            $table->decimal('dueAmount', 10, 2);
            $table->date('startDate');
            $table->string('sector')->nullable();
            $table->decimal('paidIntrestAmount', 10, 2)->nullable();
            $table->decimal('paidLoanAmount', 10, 2)->nullable();
            $table->decimal('totalPaid', 10, 2)->nullable();
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
        Schema::dropIfExists('financials');
    }
}