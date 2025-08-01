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
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')
                ->constrained('roles') // tạo khóa ngoại tới bảng roles
                ->onDelete('cascade'); // khi xóa role thì xóa liên kết
            $table->foreignId('user_id')
                ->constrained('users') // tạo khóa ngoại tới bảng users
                ->onDelete('cascade'); // khi xóa user thì xóa liên kết
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
