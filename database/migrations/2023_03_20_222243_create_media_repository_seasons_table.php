<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Src\Application\MediaRepositorySeasons\Infrastructure\Enum\Status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media_repository_seasons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order');
            $table->char('media_repository_id',36);
            $table->char('file_id', 36)->nullable();
            $table->foreign('media_repository_id')->references('id')->on('media_repositories');
            $table->foreign('file_id')->references('id')->on('files_users');
            $table->string('status')->default(Status::IN_PROGRESS->value);
            $table->unique(['media_repository_id','order']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_repository_seasons');
    }
};
