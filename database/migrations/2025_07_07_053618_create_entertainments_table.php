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
        Schema::create('entertainments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('tmdb_id')->nullable();
            $table->text('thumbnail_url')->nullable();
            $table->text('poster_url')->nullable();
            $table->longText('description')->nullable();
            $table->string('trailer_url_type')->nullable();
            $table->string('type')->nullable();
            $table->text('trailer_url')->nullable();
            $table->string('language')->nullable();
            $table->string('IMDb_rating')->nullable();
            $table->string('duration')->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entertainments');
    }
};
