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
        Schema::create('profile_education', function (Blueprint $table) {
            $table->id();
            $table->string('degree_name');
            $table->string('instution_name');
            $table->string('major_subject');
            $table->date('start_date');
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('profile_education');
    }
};
