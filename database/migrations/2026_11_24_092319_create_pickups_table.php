<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete();
            $table->string('taker_name');
            $table->string('taker_identity'); // NIM / no HP
            $table->text('notes')->nullable();
            $table->foreignId('verified_by')->constrained('users');
            $table->dateTime('picked_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pickups');
    }
};