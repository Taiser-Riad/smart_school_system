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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users', 'id')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->foreignId('classroom_id')
                  ->nullable()
                  ->constrained('classrooms', 'id')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('img')->nullable();
            $table->string('fatherName');
            $table->string('motherFirstName');
            $table->string('motherLastName');
            $table->string('fatherPhone');
            $table->string('motherPhone');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dateOfBirth');
            $table->integer('age');
            $table->string('gender');
            $table->integer('schoolYear');
            $table->integer('group');
            $table->longText('about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
