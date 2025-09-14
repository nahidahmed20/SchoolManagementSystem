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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name',100)->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('occupation')->nullable();
            $table->string('password');
            $table->string('admission_number')->nullable();
            $table->integer('roll_number')->nullable();
            $table->string('class_id')->nullable();
            $table->string('caste')->nullable();
            $table->string('religion')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('gender',100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('designation',100)->nullable();
            $table->string('department',100)->nullable();
            $table->string('number',100)->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('marital_status',100)->nullable();
            $table->string('qualification',100)->nullable();
            $table->string('work_experience',100)->nullable();
            $table->string('nationality',100)->nullable();
            $table->string('blood_group',100)->nullable();
            $table->string('address',200)->nullable();
            $table->string('image')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('is_admin')->nullable()->comment('1=Super Admin, 2=School, 3=School Admin, 4=Teacher, 5=Student, 6=Parent');
            $table->string('created_by',100)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
