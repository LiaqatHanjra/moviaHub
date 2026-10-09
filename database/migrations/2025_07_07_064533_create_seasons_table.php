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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('tmdb_id')->nullable();
            $table->string('season_index')->nullable();
            $table->string('name')->nullable();
            $table->text('poster_url')->nullable();
            $table->unsignedBigInteger('entertainment_id')->nullable();
            $table->string('trailer_url_type')->nullable();
            $table->text('trailer_url')->nullable();
            $table->boolean('status')->default(0);
            $table->longText('short_desc')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('seasons');
    }
};
