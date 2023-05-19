<x-layout>
<x-slot:active>dashboard</x-slot>
<x-slot:page></x-slot>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
<main class="container dashboard" id="main">
  <div class="row row-cols-md-5 row-cols-sm-2 d-flex">
    <a href="{{ route('Admin.permohonan-list', '') }}">
      <div><i class="bi bi-list-task"></i></div>
      <div>Daftar permohonan</div>
    </a>
    <a href="{{ route('Admin.permohonan-list', 'ditolak') }}">
      <div><i class="bi bi-x-square"></i></div>
      <div>Daftar permohonan ditolak</div>
    </a>
    <a href="{{ route('Admin.permohonan-list', 'belum_ditinjau') }}">
      <div><i class="bi bi-eye-slash"></i></div>
      <div>Daftar permohonan belum ditinjau</div>
    </a>
    <a href="{{ route('Admin.permohonan-list', 'lengkap') }}">
      <div><i class="bi bi-file-earmark-code"></i></div>
      <div>Dalam proses pembuatan</div>
    </a>
    <a href="{{ route('Admin.permohonan-list', 'ready_bimtek') }}">
      <div><i class="bi bi-person-workspace"></i></div>
      <div>Ready bimtek</div>
    </a>
    <a href="{{ route('Admin.permohonan-list', 'ttd') }}">
      <div><i class="bi bi-pen"></i></div>
      <div>Proses TTD Kadis</div>
    </a>
    <a href="{{ route('Admin.permohonan-list', 'siap') }}">
      <div><i class="bi bi-pen"></i></div>
      <div>Berita acara siap</div>
    </a>
    <a href="{{ route('Admin.permohonan-list', 'diambil') }}">
      <div><i class="bi bi-pen"></i></div>
      <div>Berita acara diambil</div>
    </a>
  </div>
</main>
</x-layout>