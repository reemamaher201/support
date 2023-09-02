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
        Schema::create('acceptances', function (Blueprint $table) {
            $table->id();
            $table->string('assigned');//مكلف بالصيانة
            $table->string('maintenance_location'); // مكان الصيانة
            $table->datetime('delivery_time');
            $table->string('receiver');//المستلم
            $table->string('received_device'); // الجهاز المستلم
            $table->unsignedBigInteger('support_id'); // اي دي المشكلة
            $table->integer('employee_id'); // اي دي صاحب المشكلة
            $table->text('procedures_token')->nullable();
            $table->string('procedures_status')->nullable();
            $table->timestamp('procedures_time')->nullable();
            $table->text('spare_name')->nullable();
            $table->string('method_spare')->nullable();
            $table->timestamp('savingSpare_time')->nullable();
            $table->timestamps();

            $table->foreign('support_id')->references('id')->on('support_requests')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceptances');
    }
};
