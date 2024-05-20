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
        Schema::create('call_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_type_id')->constrained('ac_user_types')->onDelete('cascade');
            $table->string('language');
            $table->string('center');
            $table->string('call_status');
            $table->string('job_status');
            $table->string('customer_status');
            $table->string('comment');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_data');
    }
};
