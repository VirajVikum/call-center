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
        Schema::table('call_data', function (Blueprint $table) {
            // Check if the column exists before dropping the foreign key
            if (Schema::hasColumn('call_data', 'user_type_id')) {
                // Drop the existing foreign key if it exists
                
                // Drop the column
                $table->dropColumn('user_type_id');
            }
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('call_data', function (Blueprint $table) {
            // Check if the column exists before dropping the foreign key
            if (Schema::hasColumn('call_data', 'agent_id')) {
                // Drop the new foreign key if it exists
                $table->dropForeign(['agent_id']);
                
                // Drop the column
                $table->dropColumn('agent_id');
            }
            
            // Add the old column and foreign key back
            $table->foreignId('user_type_id')->constrained('ac_user_types')->onDelete('cascade');
        });
    }
};
