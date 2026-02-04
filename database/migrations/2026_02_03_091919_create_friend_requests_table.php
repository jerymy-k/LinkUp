<?php
// database/migrations/xxxx_xx_xx_create_friend_requests_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('friend_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sender_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('receiver_id')->constrained('users')->cascadeOnDelete();

            $table->string('status')->default('pending'); // pending | accepted | declined

            $table->timestamps();

            // Empêche les doublons (même sender -> receiver)
            $table->unique(['sender_id', 'receiver_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('friend_requests');
    }
};
