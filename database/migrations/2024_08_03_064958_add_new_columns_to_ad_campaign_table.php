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
            $table->string('satisfaction_level')->nullable();
            $table->string('satisfaction_status')->nullable();
            $table->text('satisfaction_reasons')->nullable();
            $table->text('dissatisfaction_reasons')->nullable();
            $table->date('completed_date')->nullable();
            $table->text('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ad_campaigns', function (Blueprint $table) {
            $table->dropColumn('satisfaction_level');
            $table->dropColumn('satisfaction_status');
            $table->dropColumn('satisfaction_reasons');
            $table->dropColumn('dissatisfaction_reasons');
            $table->dropColumn('completed_date');
            $table->dropColumn('remarks');
        });
    }
};
