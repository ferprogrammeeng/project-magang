<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('permohonans', function (Blueprint $table) {
      $table->id();
      $table->string('nama_desa', 100)->default();
      $table->string('no_resi', 18)->default();
      $table->string('jenis_website', 10)->default('Desa');
      $table->string('link_syarat')->default();
      $table->string('nama_pj', 100)->default();
      $table->string('nip_pj', 18)->default();
      $table->string('nama_wakil', 100)->default();
      $table->string('nip_wakil', 18)->default();
      $table->string('jabatan_wakil', 50)->default();
      $table->string('pangkat_wakil', 10)->default();
      $table->string('kode_pos', 6)->default();
      $table->string('email', 50)->default();
      $table->string('no_hp', 20)->default();
      $table->tinyInteger('status')->default(1);
      $table->string('riwayat', 255)->default();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('permohonans');
  }
};
