<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Check if the 'users' table exists
        if (Schema::hasTable('users')) {
            // Check if the 'name' column does not exist
            if (!Schema::hasColumn('users', 'name')) {
                // Add the 'name' column to the 'users' table
                Schema::table('users', function (Blueprint $table) {
                    $table->string('name');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Check if the 'users' table exists
        if (Schema::hasTable('users')) {
            // Check if the 'name' column exists
            if (Schema::hasColumn('users', 'name')) {
                // Drop the 'name' column from the 'users' table
                Schema::table('users', function (Blueprint $table) {
                    $table->dropColumn('name');
                });
            }
        }
    }
}
