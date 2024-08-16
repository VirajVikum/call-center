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
        Schema::table('users', function (Blueprint $table) {
            // Adding new columns to the users table
            $table->string('user_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('nic')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('extension')->nullable();
            $table->integer('status')->default(0);
            $table->integer('del_status')->default(0);
            $table->foreignId('user_type_id')->nullable()->constrained('ac_user_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the columns
            $table->dropColumn([
                'user_name', 'phone', 'nic', 'gender', 'address',
                'extension', 'status', 'del_status', 'user_type_id'
            ]);
        });
    }
};
