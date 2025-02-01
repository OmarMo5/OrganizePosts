<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable()->default("DIV.IO");
            $table->string('facebook')->nullable()->default("https://facebook.com");
            $table->string('github')->nullable()->default("https://github.com");
            $table->string('linkedin')->nullable()->default("https://linkedin.com");
            $table->string('youtube')->nullable()->default("https://youtube.com");
            $table->text('about_us_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
