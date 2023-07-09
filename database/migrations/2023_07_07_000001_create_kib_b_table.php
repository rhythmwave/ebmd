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
        Schema::create('kib_b', function (Blueprint $table) {
            $table->string('IDPemda',128);
            $table->integer('Tahun')->nullable();
            $table->integer('Harga')->nullable();
            $table->integer('Nilai_Susut1')->nullable();
            $table->integer('Nilai_Susut2')->nullable();
            $table->integer('Akum_Susut')->nullable();
            $table->integer('Nilai_Sisa')->nullable();
            $table->integer('Sisa_Umur')->nullable();
            $table->integer('Jndt')->nullable();
            $table->integer('Kd_Bidang')->nullable();
            $table->integer('Kd_Unit')->nullable();
            $table->integer('Kd_Sub')->nullable();
            $table->integer('Kd_UPB')->nullable();
            $table->string('Nm_UPB',64)->nullable();
            $table->integer('Kd_Aset8')->nullable();
            $table->integer('Kd_Aset80')->nullable();
            $table->integer('Kd_Aset81')->nullable();
            $table->integer('Kd_Aset82')->nullable();
            $table->integer('Kd_Aset83')->nullable();
            $table->integer('Kd_Aset84')->nullable();
            $table->integer('Kd_Aset85')->nullable();
            $table->string('Nm_Aset5',128)->nullable();
            $table->integer('No_Reg8')->nullable();
            $table->string('Merk',64)->nullable();
            $table->string('Type',64)->nullable();
            $table->string('CC',16)->nullable();
            $table->string('Bahan',16)->nullable();
            $table->string('Tgl_Perolehan',16)->nullable();
            $table->string('Nomor_Pabrik',64)->nullable();
            $table->string('Nomor_Rangka',32)->nullable();
            $table->string('Nomor_Mesin',32)->nullable();
            $table->string('Nomor_Polisi',16)->nullable();
            $table->string('Nomor_BPKB',16)->nullable();
            $table->string('Asal_usul',16)->nullable();
            $table->string('Kondisi',16)->nullable();
            $table->integer('Kd_KA')->nullable();
            $table->string('Keterangan',128)->nullable();
            $table->string('Column38',64)->nullable();            
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kib_b');
    }
};
