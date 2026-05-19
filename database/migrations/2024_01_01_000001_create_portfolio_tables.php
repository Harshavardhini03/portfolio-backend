<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── abouts ──────────────────────────────────────────────
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->text('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('photo_url')->nullable();
            $table->timestamps();
        });

        // ── skills ──────────────────────────────────────────────
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->unsignedTinyInteger('category_order')->default(0);
            $table->string('name');
            $table->unsignedTinyInteger('level');   // 0–100
            $table->string('color', 20)->default('#00f5d4');
            $table->timestamps();
        });

        // ── projects ────────────────────────────────────────────
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->json('tech')->nullable();
            $table->string('github_url')->nullable();
            $table->string('live_url')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('featured')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        // ── experiences ─────────────────────────────────────────
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('role');
            $table->string('start_date', 20);
            $table->string('end_date', 20)->nullable();
            $table->boolean('is_current')->default(false);
            $table->string('location')->nullable();
            $table->json('description');            // Array of bullet strings
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        // ── educations ──────────────────────────────────────────
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('institution');
            $table->string('degree');
            $table->string('year', 10);
            $table->string('cgpa', 20)->nullable();
            $table->string('icon', 10)->default('🎓');
            $table->timestamps();
        });

        // ── contacts ────────────────────────────────────────────
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('abouts');
    }
};
