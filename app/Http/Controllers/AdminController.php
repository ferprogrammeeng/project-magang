<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client;

class AdminController extends Controller
{
  private $alert;

  /**
   * Tampilkan dashboard admin
   *
   * @param  Illuminate\Http\Request          $request
   * @return Illuminate\Http\RedirectResponse
   */
  public function index(Request $request)
  {
    // kembali ke form login bila user belum login
    if (!session()->get('admin_name')) {
      $this->setAlert('warning', '#f7dada', 'Mohon login terlebih dahulu!');
      return to_route('Admin.form')->with('alert', $this->alert);
    }

    $data = [];
    return view('admin.index', $data);
  }


  /**
   * Tampilkan semua permohonan
   *
   * @return Illuminate\View\View
   */
  public function list(string $filter='')
  {
    if (!session()->get('admin_name')) {
      $this->setAlert('warning', '#f7dada', 'Mohon login terlebih dahulu!');
      return to_route('Admin.form')->with('alert', $this->alert);
    }

    $filters = [
      // 'ditolak' => 0,
      'belum ditinjau' => 1,
      'proses' => 2,
      'ready bimtek' => 3,
      'ttd' => 4,
      'siap' => 5,
      'diambil' => 6,
    ];

    $data['filter'] = ($filter = str_replace('_', ' ', $filter));
    $data['status'] = [
      [ 'danger',  'Ditolak' ],
      [ 'warning', 'Belum ditinjau' ],
      [ 'primary', 'Proses pembuatan' ],
      [ 'success', 'Ready bimtek' ],
      [ 'info',   'Proses TTD Kadis' ],
      [ 'white',   'Berita acara siap' ],
      [ 'secondary',   'Berita acara diambil' ],
    ];

    // http://.../admin/permohonan
    if ($filter === '') {
      $data['permohonan'] = Permohonan::whereNot('status', '0')->get();
      return view('admin.permohonan', $data);

    // .../admin/permohonan/123
    } else if ((int)$filter !== 0) {
      return $this->detail($filter);
    }

    $data['permohonan'] = Permohonan::where('status', $filters[$filter])->get();

    return view('admin.permohonan', $data);
  }


  /**
   * Tampilkan permohonan secara spesifik
   *
   * @return Illuminate\View\View
   */
  public function detail(string $id)
  {
    if (!session()->get('admin_name')) {
      $this->setAlert('warning', '#f7dada', 'Mohon login terlebih dahulu!');
      return to_route('Admin.form')->with('alert', $this->alert);
    }

    $data['permohonan'] = Permohonan::where('id', $id)->get()->first();
    $data['filter'] = [
      'ditolak', 'belum ditinjau', 'proses', 'ready bimtek', 'ttd', 'siap', 'diambil'
    ][$data['permohonan']->status];

    $data['color'] = ['danger', 'warning', 'primary', 'success', 'info', 'white', 'secondary'];
    $data['target'] = match($data['permohonan']->status) {
      0 => 'Ditolak',
      3 => 'Bimtek',
      default => ''
    };

    return view('admin.permohonan-detail', $data);
  }


  /**
   * Tampilkan halaman form login untuk admin
   *
   * @return Illuminate\View\View
   */
  public function form(Request $request)
  {
    if (session()->get('admin_name')) {
      return to_route('Admin.dashboard');
    }
    return view('admin.form');
  }


  /**
   *
   */
  public function update(Request $request)
  {
    if (!session()->get('admin_name')) {
      $this->setAlert('warning', '#f7dada', 'Mohon login terlebih dahulu!');
      return to_route('Admin.form')->with('alert', $this->alert);
    }

    $status = [
      'Permohonan ditolak',
      'Permohonan dibuat',
      'Permohonan diterima',
      'Ready bimtek',
      'Ditandatangani Kadis',
      'Berita acara siap',
      'Berita acara diambil',
    ];

    $permohonan = Permohonan::where('id', $request->id);
    $riwayat = json_encode($permohonan->get()->first()['riwayat']);

    $status_update = $status[$request->status];
    $riwayat->$status_update = date('d-m-Y', mktime(0));

    $updated = $permohonan->update([
      'status' => $request->status,
      'riwayat' => json_encode($riwayat),
    ]);

    if ($updated) {
      $this->setAlert('success', '#daf7da', 'Update status berhasil!');
      $email_prop = [
        'waktu' => $this->waktu((int) date('G')),
        'd_time' => $this->date_time(),
        'name' => $request->nama_pj,
        'resi' => '',
        'message' => isset($request->message) ? $request->message : '',
      ];

      if ($request->status == 0) {
        $email_prop['msg'] = $request->message;
      } elseif ($request->status == 5) {
        $file = $request->file('berita_acara');

        $disk = Storage::build([
          'driver' => 'local',
          'root' => "berita-acara/{}$request->no_resi}",
        ]);

        $file = file_get_contents($file->getRealPath());
        $disk->put('berita-acara.pdf', $file);

        // kirim email
        $email_prop = [
          'waktu'   => $this->waktu((int) date('G')),
          'd_time'  => $this->date_time(),
          'name'    => $request['nama_wakil'],
          'no_resi' => $request->no_resi,
          'attach_file' => true,
        ];
      }

      $email_view = [
        '0' => 'ditolak',
        '2' => 'proses',
        '3' => 'ready_bimtek',
        '5' => 'ba_siap',
      ][$request->status] ?? '';

      if ($email_view !== '') {
        if ($this->sendMail($request->email, $email_view, $email_prop)) {
          $this->setAlert('success', '#daf7da', 'Email berhasil dikirim!');
        } else {
          $this->setAlert('warning', '#f7e7da', 'Email gagal dikirim!');
        }
      }

    } else {
      $this->setAlert('error', '#f7dada', 'Update status gagal!');
    }

    if ($request->status == 0) return to_route('Admin.permohonan')
      ->with('alert', $this->alert);

    return to_route('Admin.permohonan-detail', [ 'id' => $request->id ])
      ->with('alert', $this->alert);
  }


  /**
   * Proses login
   *
   * @param  Illuminate\Http\Request          $request
   * @return Illuminate\Http\RedirectResponse
   */
  public function login(Request $request)
  {
    // dapatkan username dan password
    $user = Admin::where('username', $request->username)
      ->get(['username', 'password'])
      ->first();

    // kembali ke form login bila username tidak ada
    if (!$user) {
      $this->setAlert('error', '#f7dada', 'Username tidak ditemukan!');
      return back()->with('alert', $this->alert);
    }

    // kembali ke form login bila password salah
    if ($user->password !== $request->password) {
      $this->setAlert('error', '#f7dada', 'Password salah!');
      return back()->with('alert', $this->alert);
    }

    // masuk ke halaman dashboard admin
    $request->session()->put('admin_name', $user->username);
    $this->setAlert('', '#daf7da', "Selamat datang, {$user->username}");
    return to_route('Admin.dashboard')->with('alert', $this->alert);
  }


  /**
   * Proses logout
   *
   * @param  Illuminate\Http\Request          $request
   * @return Illuminate\Http\RedirectResponse
   */
  public function logout(Request $request)
  {
    // kembali ke form login bila user belum login
    if (!$request->session()->get('admin_name')) {
      return to_route('Admin.form');
    }

    $request->session()->forget('admin_name');

    $this->setAlert('', '#daf7da', 'Anda telah logout!');
    return to_route('Admin.form')->with('alert', $this->alert);
  }


  private function setAlert($type, $color, $msg)
  {
    $this->alert = compact('type', 'color', 'msg');
  }
}
