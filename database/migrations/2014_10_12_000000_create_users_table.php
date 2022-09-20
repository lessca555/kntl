<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_uuid');
            $table->string('nisn')->nullable();
            $table->string('kelas')->nullable();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('jk');
            $table->string('alamat')->nullable();
            $table->string('tlpn')->nullable();
            $table->string('tempat')->nullable();
            $table->string('ttl')->nullable();
            // $table->string('pelanggaran')->nullable();
            $table->string('avatar')->nullable();
            // $table->string('gambarqr')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
