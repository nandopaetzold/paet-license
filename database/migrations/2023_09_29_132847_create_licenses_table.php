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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('ip_address', 120)->nullable();
            $table->string('token', 120)->unique()->index();
            $table->date('expires_at')->nullable();
            $table->unsignedBigInteger('company_id')->constrained();
            $table->boolean('is_active')->default(true);
            $table->string('webhook_url', 120)->nullable();
            $table->integer('request_count')->default(0);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
