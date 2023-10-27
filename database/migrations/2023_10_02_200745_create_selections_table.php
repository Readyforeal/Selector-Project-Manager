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
        Schema::create('selections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('selection_list_id');
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('notes')->nullable();
            $table->string('item_number')->nullable();
            $table->string('supplier')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('finish')->nullable();
            $table->string('color')->nullable();
            $table->index('selection_list_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selections');
    }
};
