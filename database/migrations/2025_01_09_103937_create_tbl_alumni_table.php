<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_alumni', function (Blueprint $table) {
            $table->id('id_alumni'); // Primary key
            $table->unsignedBigInteger('id_tahun_lulus'); // Foreign key
            $table->unsignedBigInteger('id_konsentrasi_keahlian'); // Foreign key
            $table->unsignedBigInteger('id_status_alumni'); // Foreign key
            $table->string('nisn', 20)->unique();
            $table->string('nik', 20)->unique();
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50)->nullable();
            $table->string('jenis_kelamin', 10);
            $table->string('tempat_lahir', 20);
            $table->date('tgl_lahir');
            $table->string('alamat', 50)->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('akun_fb', 50)->nullable();
            $table->string('akun_ig', 50)->nullable();
            $table->string('akun_tiktok', 50)->nullable();
            $table->string('email', 50);
            $table->longText('password');
            $table->enum('status_login', ['0', '1']);
            $table->timestamps();

            // Definisi relasi foreign key
            $table->foreign('id_tahun_lulus')
                ->references('id_tahun_lulus')->on('tb_tahun_lulus')
                ->onDelete('cascade');

            $table->foreign('id_konsentrasi_keahlian')
                ->references('id_konsentrasi_keahlian')->on('tbl_konsentrasi_keahlian')
                ->onDelete('cascade');

            $table->foreign('id_status_alumni')
                ->references('id_status_alumni')->on('tbl_status_alumni')
                ->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_alumni');
    }
};
