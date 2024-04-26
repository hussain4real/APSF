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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_side_title')->nullable();
            $table->string('service_title')->nullable();
            $table->text('service_description')->nullable();
            $table->string('service_tag_one')->nullable();
            $table->string('service_tag_two')->nullable();
            $table->string('service_tag_three')->nullable();
            $table->string('service_tag_four')->nullable();
            $table->string('service_tag_five')->nullable();
            //two
            //            $table->string('service_side_title_two')->nullable();
            //            $table->string('service_title_two')->nullable();
            //            $table->text('service_description_two')->nullable();
            //            $table->string('service_title_two_tag_one')->nullable();
            //            $table->string('service_title_two_tag_two')->nullable();
            //            $table->string('service_title_two_tag_three')->nullable();
            //            $table->string('service_title_two_tag_four')->nullable();
            //            $table->string('service_title_two_tag_five')->nullable();
            //            //three
            //            $table->string('service_side_title_three')->nullable();
            //            $table->string('service_title_three')->nullable();
            //            $table->text('service_description_three')->nullable();
            //            $table->string('service_title_three_tag_one')->nullable();
            //            $table->string('service_title_three_tag_two')->nullable();
            //            $table->string('service_title_three_tag_three')->nullable();
            //            $table->string('service_title_three_tag_four')->nullable();
            //            $table->string('service_title_three_tag_five')->nullable();
            //            //four
            //            $table->string('service_side_title_four')->nullable();
            //            $table->string('service_title_four')->nullable();
            //            $table->text('service_description_four')->nullable();
            //            $table->string('service_title_four_tag_one')->nullable();
            //            $table->string('service_title_four_tag_two')->nullable();
            //            $table->string('service_title_four_tag_three')->nullable();
            //            $table->string('service_title_four_tag_four')->nullable();
            //            $table->string('service_title_four_tag_five')->nullable();
            //            //five
            //            $table->string('service_side_title_five')->nullable();
            //            $table->string('service_title_five')->nullable();
            //            $table->text('service_description_five')->nullable();
            //            $table->string('service_title_five_tag_one')->nullable();
            //            $table->string('service_title_five_tag_two')->nullable();
            //            $table->string('service_title_five_tag_three')->nullable();
            //            $table->string('service_title_five_tag_four')->nullable();
            //            $table->string('service_title_five_tag_five')->nullable();
            //            //six
            //            $table->string('service_side_title_six')->nullable();
            //            $table->string('service_title_six')->nullable();
            //            $table->text('service_description_six')->nullable();
            //            $table->string('service_title_six_tag_one')->nullable();
            //            $table->string('service_title_six_tag_two')->nullable();
            //            $table->string('service_title_six_tag_three')->nullable();
            //            $table->string('service_title_six_tag_four')->nullable();
            //            $table->string('service_title_six_tag_five')->nullable();
            //scholarship
            //            $table->string('scholarship_title')->nullable();
            //            $table->text('scholarship_description')->nullable();
            //            $table->string('scholarship_action_text')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
