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
        Schema::create('cataloged_selection_item_selection', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cataloged_selection_id');
            $table->unsignedBigInteger('selection_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cataloged_selection_item_selection');
    }
};
