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
        Schema::create('coding_skills', function (Blueprint $table) {
            $table->id();
            $table->string('skill');
            $table->integer('per_you_cover');
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
        Schema::dropIfExists('coding_skills');
    }
};
