<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('support_id');
            $table->integer('employee_id');
            $table->integer('emp_support_id');
            $table->decimal('rating', 5, 2);
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('support_id')->references('id')->on('deliveries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
