<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration {
    /**
     * Run the migrations.
     * 
     * Return void
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $categories = [
            'bolsos',
            'zapatos',
            'joyeria',
            'relojeria',
            'bisuteria',
            'ropa'
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};