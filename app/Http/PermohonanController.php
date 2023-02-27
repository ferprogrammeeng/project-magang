<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermohonanRequest;
use App\Models\Permohonan;
use App\Models\Admin;
use Spatie\Dropbox\Client;


class PermohonanController extends Controller
{
  /**
   * Tampilkan form untuk membuat permohonan baru
   *
   * @return Illuminate\Http\Response
   */
  public function create()
  {
    return view('permohonan.form');
  }


  /**
   * Simpan data ke database
   *
   * @param  App\Http\Requests\PermohonanRequest $request
   * @return Illuminate\Http\RedirectResponse
   */
  public function store(PermohonanRequest $request)
  {
    $data = array_merge($request->validated(), [
      'no_resi' => date('\P-Udmy'),
    ]);

    $dropbox = new Client(env('DROPBOX_ACCESS_TOKEN'));
    $i = 1;
    foreach ($data['syarat'] as $syarat) {
      $endpoint = 'files/upload';
      $params = ['path' => "/syarat/$data[no_resi]/syarat-$i.pdf"];
      $file = file_get_contents($syarat->getRealPath());

      $dropbox->contentEndpointRequest($endpoint, $params, $file);
      $i++;
    }

    $endpoint = 'sharing/share_folder';
    $params = [
      'access_inheritance' => 'inherit',
      'acl_update_policy' => 'editors',
      'force_async' => false,
      'path' => "/syarat/$data[no_resi]",
    ];

    $shared = $dropbox->rpcEndpointRequest($endpoint, $params);
    $data['link_syarat'] = $shared['preview_url'];

    $members = Admin::select('email')->get()->map(function($member) {
      return [
        'access_level' => 'editor',
        'member' => [
          '.tag' => 'email', 'email' => $member->email,
        ],
      ];
    });

    $dropbox->rpcEndpointRequest('sharing/add_folder_member', [
      'quiet' => false,
      'shared_folder_id' => $shared['shared_folder_id'],
      'members' => $members
    ]);

    if (Permohonan::create($data)) {
      $email_prop = [
        'waktu'  => $this->waktu((int) date('G')),
        'd_time' => $this->date_time(),
        'name'   => $data['nama_wakil'],
        'resi'   => $data['no_resi'],
      ];

      $this->sendMail($data['email'], 'dibuat', $email_prop);

      $alert['msg'] = 'Permohonan berhasil dibuat!';
      $alert['type'] = 'success';
    } else {
      $alert['msg'] = 'Permohonan gagal dibuat!';
      $alert['type'] = 'error';
    }
    
    return to_route('Permohonan.form')->with('alert', $alert);
  }


  /**
   * Tampilkan halaman cek resi permohonan
   *
   * @return \Illuminate\Http\Response
   */
  public function resi()
  {
    return view('permohonan.resi');
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
}
