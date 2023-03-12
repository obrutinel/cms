<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
                ->nullable()
                ->references('id')
                ->on('pages')
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('content')->nullable();
            $table->string('slug', 255)->nullable()->unique();

            $table->string('meta_title')->nullable();
            $table->tinyText('meta_desc')->nullable();

            $table->string('type', 255)->default('page');
            $table->boolean('is_publish')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
