<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')
                ->nullable()
                ->references('id')
                ->on('group_settings')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('type', 50)->default('text');
            $table->string('slug')->nullable()->unique();
            $table->text('value')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
