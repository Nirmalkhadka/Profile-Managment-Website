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
        Schema::create('project_abouts', function (Blueprint $table) {
            $table->id('projectId');
            $table->string('title');
            $table->longText('projectDesc');
            $table->string('projectLink')->nullable();
            $table->unsignedBigInteger('profile_uid');
            $table->timestamps();
            $table->foreign('profile_uid')->references('profile_uid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_abouts');
    }
};
