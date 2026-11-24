<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained();
            $table->string('color');
            $table->text('description')->nullable();        // deskripsi lengkap (internal)
            $table->text('special_features')->nullable();   // ciri khusus (internal, untuk verifikasi)
            $table->string('found_location');
            $table->dateTime('found_at');
            $table->string('photo')->nullable();            // foto internal, tidak tampil di publik
            $table->foreignId('storage_location_id')->constrained();
            $table->foreignId('reporter_id')->nullable()->constrained();
            $table->string('status')->default('tersimpan');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};