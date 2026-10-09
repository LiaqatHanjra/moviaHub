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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('poster_url')->nullable();
            $table->unsignedBigInteger('entertainment_id')->nullable();
            $table->unsignedBigInteger('season_id')->nullable();
            $table->string('trailer_url_type')->nullable();
            $table->text('trailer_url')->nullable();
            $table->string('duration')->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('is_restricted')->default(0);
            $table->longText('short_desc')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->string('tmdb_id')->nullable();
            $table->string('tmdb_season')->nullable();
            $table->string('episode_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
