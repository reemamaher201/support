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
        Schema::table('acceptances', function (Blueprint $table) {
            $table->text('procedures_token')->nullable();
            $table->string('procedures_status')->nullable();
            $table->timestamp('procedures_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acceptance', function (Blueprint $table) {
            //
        });
    }
};
