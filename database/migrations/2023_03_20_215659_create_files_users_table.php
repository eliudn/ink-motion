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
        Schema::create('files_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('filename')->unique();
            $table->string('file_type')->nullable();
            $table->integer('file_size')->nullable();
            $table->string('path');
            $table->integer('file_saving_service_id');
            $table->string('resolution')->nullable();
            $table->char('user_id',36);
            $table->unique(['user_id','filename','file_type']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('file_saving_service_id')->references('id')->on('file_saving_service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_users');
    }
};
