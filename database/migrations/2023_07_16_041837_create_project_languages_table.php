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
        Schema::create('project_languages', function (Blueprint $table) {
            $table->id();
            $table->string('projectLanguage');
            $table->unsignedBigInteger('profile_uid');
            $table->unsignedBigInteger('projectId');
            $table->timestamps();
            $table->foreign('profile_uid')->references('profile_uid')->on('users');
            $table->foreign('projectId')->references('projectId')->on('project_abouts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_languages');
    }
};
