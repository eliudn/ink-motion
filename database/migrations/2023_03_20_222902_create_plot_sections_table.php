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
        Schema::create('plot_sections', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('order');
            $table->char('media_repository_id',36);

            $table->foreign('media_repository_id')->references('id')->on('media_repositories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plot_sections');
    }
};
