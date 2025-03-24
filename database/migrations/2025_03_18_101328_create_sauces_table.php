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
        Schema::create('sauces', function (Blueprint $table) {
            $table->id("sauceId");
            $table->foreignId("userId")->constrained("users","id")->onDelete("cascade");
            $table->string("name");
            $table->string("manufacturer");
            $table->string("description");
            $table->string("mainPepper");
            $table->string("imageUrl");
            $table->tinyInteger("heat");
            $table->integer("likes")->default(0);
            $table->integer("dislikes")->default(0);
            $table->json("usersLiked")->nullable();
            $table->json("usersDisliked")->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauces');
    }
};
