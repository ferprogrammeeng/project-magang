<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Permohonan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Permohonan::factory(5)->create();

    Admin::create([
      'username' => 'iqbal',
      'password' => '123',
      'email' => 'iqbal.thex@gmail.com',
      'no_hp' => '081231360159',
    ]);
    Admin::create([
      'username' => 'ferdi',
      'password' => '123',
      'email' => 'ardiansyahferdy117@gmail.com',
      'no_hp' => '082171543870',
    ]);
  }
}
