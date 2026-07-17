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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('workspace_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamp('borrow_start');
            $table->timestamp('borrow_end');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'cancelled',
                'borrowed',
                'completed',
            ])->default('pending');

            $table->text('notes')->nullable();

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')->nullable();
            $table->timestamp('checkout_at')->nullable();
            $table->timestamp('checkin_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};