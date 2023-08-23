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
        Schema::create('support_requests', function (Blueprint $table) {
        $table->id();
        $table->integer('employee_id');
        $table->string('issue_title');
        $table->text('issue_description');
        $table->string('requester_name');
        $table->string('office_location');
        $table->json('attachments')->nullable();
        $table->timestamps();

            $table->foreign('employee_id')->references('emp_id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_requests');
    }
};
