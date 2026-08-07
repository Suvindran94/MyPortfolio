<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_hdr', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('stack')->nullable();
            $table->date('date')->nullable();
            $table->string('website_url')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('portfolio_dt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id')->nullable()->index();
            $table->string('image')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_dt');
        Schema::dropIfExists('portfolio_hdr');
    }
};
