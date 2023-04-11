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
        Schema::create('plot_sections_files', function (Blueprint $table) {
            $table->uuid('id');
            $table->char('file_id',36);
            $table->char('plot_section_id',36);
            $table->integer('order');
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files_users');
            $table->foreign('plot_section_id')->references('id')->on('plot_sections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plot_sections_files');
    }
};
