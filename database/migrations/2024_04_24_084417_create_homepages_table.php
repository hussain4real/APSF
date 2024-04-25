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
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description_one')->nullable();
            $table->text('hero_description_two')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('values_heading')->nullable();
            $table->string('value_title_one')->nullable();
            $table->text('value_description_one')->nullable();
            $table->string('value_title_two')->nullable();
            $table->text('value_description_two')->nullable();
            $table->string('value_title_three')->nullable();
            $table->text('value_description_three')->nullable();
            $table->string('value_title_four')->nullable();
            $table->text('value_description_four')->nullable();
            $table->string('value_title_five')->nullable();
            $table->text('value_description_five')->nullable();
            $table->string('value_title_six')->nullable();
            $table->text('value_description_six')->nullable();
            $table->string('chairman_message_title')->nullable();
            $table->text('chairman_message_one')->nullable();
            $table->text('chairman_message_two')->nullable();
            $table->text('chairman_message_three')->nullable();
            $table->string('partners_title')->nullable();
            $table->text('partners_description')->nullable();
            $table->string('member_action_text')->nullable();
            $table->string('member_action_url')->nullable();
            $table->text('member_description')->nullable();
            $table->string('newsletter_title')->nullable();
            $table->text('newsletter_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontends');
    }
};
