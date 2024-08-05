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
        Schema::table('ad_campaigns', function (Blueprint $table) {
            $table->string('outlet')->nullable()->change();
            $table->string('last_call_status')->nullable()->change();
            $table->integer('agent_id')->nullable()->change();
            $table->integer('call_attempt')->nullable()->change();
            $table->dateTime('next_available_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
