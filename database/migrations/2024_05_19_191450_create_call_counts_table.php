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
        Schema::create('call_counts', function (Blueprint $table) {
            $table->integer('id');
            $table->string('uniqueid');
            $table->integer('callcount');
            $table->string('direction');
            $table->integer('status');
            $table->string('ani');
            $table->string('dnis');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_counts');
    }
};
