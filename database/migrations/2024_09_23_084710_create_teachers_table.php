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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('pin')->nullable();
            $table->string('uid')->nullable();
            $table->string('subject_specialization')->nullable();
            $table->decimal('salary_amount', 10, 2)->nullable();
            $table->date('dob')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('designation')->nullable();
            $table->enum('job_status', ['active', 'inactive', 'on_leave', 'terminated'])->default('active');
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('profile_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
