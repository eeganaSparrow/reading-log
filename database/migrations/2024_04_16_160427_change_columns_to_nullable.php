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
        Schema::table('books', function (Blueprint $table) {
            $table->string('author')->nullable(true)->change();
            $table->string('publisher')->nullable(true)->change();
            $table->integer('publication_year')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('author')->nullable(false)->change();
            $table->string('publisher')->nullable(false)->change();
            $table->string('publication_year')->nullable(false)->change();
        });
    }
};
