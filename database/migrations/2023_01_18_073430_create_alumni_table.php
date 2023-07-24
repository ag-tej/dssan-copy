<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('contact')->unique();
            $table->foreignId('batch_id')->references('id')->on('batches');
            $table->string('social_link')->unique();
            $table->date('birth_date');
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->string('current_university');
            $table->string('major_subject');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
};
