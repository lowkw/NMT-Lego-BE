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
        Schema::create('collection_lego_set', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collection_id')->default(1);
            $table->unsignedBigInteger('lego_set_id')->default(1);

            $table->foreign('collection_id')->references('id')
                ->on('collections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lego_set_id')->references('id')
                ->on('lego_sets')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_lego_set');
    }
};
