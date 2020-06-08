<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('email', 191);
            $table->string('no_tlp', 20);
            $table->text('alamat');
            $table->string('footer', 191);
            $table->string('informasi', 191); // Background
            $table->string('program', 191); // Background
            $table->string('login', 191); // Background
            $table->string('checkout', 191); // Background
            $table->string('logo', 191); // Logo Header
            $table->text('no_rek'); // Untuk Transfer
            $table->string('password_default', 50); // Resert Password
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
        Schema::dropIfExists('pengaturan');
    }
}
