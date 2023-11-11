<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->nullable();
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('zip_postal_code')->nullable();
            $table->string('country')->nullable();
            $table->timestamp('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('profile_picture')->nullable(); //  storing file path
            $table->timestamps();

            // Foreign key relationship with the 'users' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
