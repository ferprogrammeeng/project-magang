<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
* @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permohonan>
*/
class PermohonanFactory extends Factory
{
  public function definition()
  {
    return [
      'nama_desa' => fake()->city(),
      'no_resi' => date('\P-Udmy'),
      'jenis_website' => ['Desa','OPD'][mt_rand(0,1)],
      'nama_pj' => fake()->name(),
      'nip_pj' => mt_rand(30,35) . mt_rand(1300,1500) . date('dmy') . mt_rand(1000,1100),
      'nama_wakil' => fake()->name(),
      'nip_wakil' => mt_rand(30,35) . mt_rand(1300,1500) . date('dmy') . mt_rand(1000,1100),
      'email' => fake()->unique()->safeEmail(),
      'no_hp' => fake()->phoneNumber(),
      'status' => mt_rand(0,6),
      'riwayat' => json_encode([
        'Permohonan dibuat' => date('d-m-Y')
      ])
    ];
  }
}
