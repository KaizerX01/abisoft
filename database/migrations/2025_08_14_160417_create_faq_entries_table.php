<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('faq_entries', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->string('tags')->nullable(); // "horaires, boutique, localisation"
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('faq_entries');
    }
};
