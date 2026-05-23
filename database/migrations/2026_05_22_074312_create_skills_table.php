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
    Schema::create('skills', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Contoh: Laravel, Flutter
        $table->string('icon_class'); // Menggunakan FontAwesome atau Devicon (Contoh: fab fa-laravel)
        $table->string('category')->default('backend'); // frontend, backend, mobile, tools
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
