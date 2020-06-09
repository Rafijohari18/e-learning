<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_kupon', function (Blueprint $table) {
            $table->id();
            $table->integer('kupon_id');
            $table->integer('program_id');
            $table->string('name', 20);  
            $table->timestamps();

            // Relasi
            $table->foreign('kupon_id')->references('id')->on('kupon')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('kategori_kupon');
    }
}
