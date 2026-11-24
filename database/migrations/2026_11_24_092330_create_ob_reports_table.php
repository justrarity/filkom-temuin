<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ob_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('item_name');
            $table->foreignId('category_id')->nullable()->constrained();
            $table->string('color')->nullable();
            $table->text('description');
            $table->string('location');
            $table->dateTime('found_at')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->default('baru');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ob_reports');
    }
};