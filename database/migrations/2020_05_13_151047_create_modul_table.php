<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modul', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('program_id');
            $table->string('judul', 191);
            $table->longtext('deskripsi');
            // $table->text('url'); // Link Embed Youtube
            $table->timestamps();

            // Relasi
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('program_id')->references('id')->on('program')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi');
    }
}
