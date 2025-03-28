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
        Schema::create('sauce_dislikes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sauceId")->constrained("sauces","sauceId")->onDelete("cascade");
            $table->foreignId("userId")->constrained("users","id")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauce_dislikes');
    }
};
