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
        Schema::create('hmlhs', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('uid');
            $table->String('note');
            $table->String('image')->nullable();
            $table->integer('createed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hmlhs');
    }
};
