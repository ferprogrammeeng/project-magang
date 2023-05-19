<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermohonanRequest;
use App\Models\Permohonan;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client;
class PermohonanController extends Controller
{
  private $alert;
  /**
   * Simpan data ke database
   *
   * @param  App\Http\Requests\PermohonanRequest $request
   * @return Illuminate\Http\RedirectResponse
   */
  public function store(PermohonanRequest $request)
  {
    // ambil input yang telah divalidasi dan generate nomor resi
    $data = array_merge($request->validated(), [
      'no_resi' => date('\P-Udmy'),
      'riwayat' => json_encode([
        'Permohonan dibuat' => date('d-m-Y', mktime(0)),
      ]),
    ]);

    // inisiasi tempat menyimpan persyaratan
    $disk = Storage::build([
      'driver' => 'local', // dropbox
      'root' => "syarat/$data[no_resi]",
    ]);

    if ($data['jenis_website'] === 'Desa') {
      $i = 1;
      foreach ($data['syarat'] as $syarat) {
        $file = file_get_contents($syarat->getRealPath());

        $disk->put("syarat-$i.pdf", $file);
        $i++;
      }
    } elseif ($data['jenis_website'] === 'OPD') {
      $file = file_get_contents($data['syarat']['opd']->getRealPath());
      $disk->put('syarat.pdf', $file);
    }

    // bila data berhasil disimpan ke database
    if (Permohonan::create($data)) {
      $email_prop = [
        'waktu'  => $this->waktu((int) date('G')),
        'd_time' => $this->date_time(),
        'name'   => $data['nama_wakil'],
        'resi'   => $data['no_resi'],
      ];

      $this->sendMail($data['email'], 'dibuat', $email_prop);

      $this->setAlert('success', 'Permohonan berhasil dibuat!');
    } else {
      $this->setAlert('error', 'Permohonan gagal dibuat!');
    }
    
    return to_route('Permohonan.form')->with('alert', $this->alert);
  }


  /**
   * Cek permohonan menggunakan nomor resi
   *
   * @param  string $no_resi
   * @return string
   */
  public function cekResi(string $no_resi)
  {
    $data = Permohonan::where('no_resi', $no_resi);

    return $data ? $data->get()->first() : '{}';
  }


  private function setAlert($type, $msg)
  {
    $this->alert = compact('type', 'msg');
  }
}
