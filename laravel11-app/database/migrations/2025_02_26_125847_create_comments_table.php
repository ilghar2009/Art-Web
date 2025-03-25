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
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('text');
            $table->string('created_by');
            $table->string('gallery_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('reply_id')->nullable();
            $table->boolean('active')->default(false);
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
