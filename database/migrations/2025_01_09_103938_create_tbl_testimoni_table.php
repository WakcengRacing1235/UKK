<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_testimoni', function (Blueprint $table) {
            $table->id('id_testimoni');
            $table->unsignedBigInteger('id_alumni')->constrained('tbl_alumni')->onDelete('cascade');
            $table->longText('testimoni');
            $table->date('tgl_testimoni');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_testimoni');
    }
};
