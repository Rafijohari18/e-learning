<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nik', 17);
            $table->string('nama_lengkap', 60);
            $table->date('tgl_lahir');
            $table->integer('umur');
            $table->enum('gender', ['L','P']);
            $table->string('whatsapp', 20);
            $table->string('email', 191)->nullable();
            $table->string('profesi', 191);
            $table->text('alamat');
            $table->text('motivasi');
            $table->timestamps();

            // Relasi
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta');
    }
}
