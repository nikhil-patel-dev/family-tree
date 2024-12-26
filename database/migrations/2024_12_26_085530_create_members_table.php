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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->unsignedBigInteger('relation_with_id')->nullable();
            $table->string('role');
            $table->string('profile_photo')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('relation_with_id')->references('id')->on('members')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
