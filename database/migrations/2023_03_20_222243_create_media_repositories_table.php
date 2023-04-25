<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Src\Application\MediaRepositories\Infrastructure\Enum\Status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media_repositories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('secondary_name')->nullable();
            $table->text('detail')->nullable();
            $table->char('user_id',36);
            $table->string('media_repository_type');
            $table->string('status')->default(Status::IN_PROGRESS->value);
            $table->char('file_id',36)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('file_id')->references('id')->on('files_users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_repositories');
    }
};
