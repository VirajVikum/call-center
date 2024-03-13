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
        Schema::create('ad_agent_skills', function (Blueprint $table) {
            $table->id();
            //$table->foreign('agent_id')->references('id')->on('ac_users');
            $table->unsignedBigInteger('agent_id');
            $table->string('skills');
            $table->string('skill_ids');
            $table->timestamps();
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_agent_skills');
    }
};
