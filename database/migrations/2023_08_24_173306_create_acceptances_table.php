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
    {  Schema::create('acceptances', function (Blueprint $table) {
        $table->id();
        $table->string('assigned');//مكلف بالصيانة
        $table->string('maintenance_location'); // مكان الصيانة
        $table->datetime('delivery_time');
        $table->string('receiver');//المستلم
        $table->string('received_device'); // الجهاز المستلم
        $table->integer('problem_id'); // اي دي المشكلة
        $table->integer('employee_id'); // اي دي صاحب المشكلة
        $table->timestamps();

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
