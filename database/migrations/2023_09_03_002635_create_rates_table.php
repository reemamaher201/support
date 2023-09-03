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
            $table->integer('rating');
            $table->text('comment')->default('لا يوجد ملاحظات ');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('employee_id')->references('emp_id')->on('users')->onDelete('cascade');
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
