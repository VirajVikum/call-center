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
        Schema::create('ac_extensions', function (Blueprint $table) {
            $table->id();
            $table->string('extension');
            $table->string('extension_type');
            $table->string('context');
            $table->string('password');
            $table->string('user_id')->default("0");
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_extensions');
    }
};
