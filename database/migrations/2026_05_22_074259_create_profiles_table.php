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
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->string('title_name');
        $table->string('sub_title');
        $table->text('about_text');
        $table->string('profile_image')->nullable();
        $table->string('cv_link')->nullable();
        $table->string('github_link')->nullable();
        $table->string('linkedin_link')->nullable();
        $table->string('instagram_link')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
