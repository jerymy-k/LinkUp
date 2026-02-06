<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->text('content')->nullable();      // texte du post
            $table->string('image_path')->nullable(); // chemin image (storage)

            $table->timestamps(); // created_at pour trier par date
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

