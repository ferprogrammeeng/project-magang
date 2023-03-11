<aside class="main-sidebar sidebar-dark-primary">

<a href="{{ route('Admin.dashboard') }}" class="brand-link d-flex justify-content-between">
  <img src="{{ asset('img/kominfo.png') }}" alt="Kominfo" class="img-circle" style="width: 30px; opacity: .7" />
</a>

<div class="sidebar">
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('Admin.dashboard') }}" class="nav-link
          {{ trim($active) === 'dashboard' ? 'active disabled' : '' }}">
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('Admin.permohonan', '') }}" class="nav-link
          {{ trim($active) === 'permohonan' ? 'active disabled' : '' }}">
          Daftar Permohonan
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('Admin.permohonan') . '/belum_ditinjau' }}" class="nav-link
          {{ trim($active) === 'belum ditinjau' ? 'active disabled' : '' }}">
          Permohonan belum ditinjau
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('Admin.permohonan') . '/proses' }}" class="nav-link
          {{ trim($active) === 'proses' ? 'active disabled' : '' }}">
          Proses pembuatan
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('Admin.permohonan') . '/ready_bimtek' }}" class="nav-link
          {{ trim($active) === 'ready bimtek' ? 'active disabled' : '' }}">
          Ready Bimtek
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('Admin.permohonan') . '/ttd' }}" class="nav-link
          {{ trim($active) === 'ttd' ? 'active disabled' : '' }}">
          Proses TTD Kadis
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('Admin.permohonan') . '/siap' }}" class="nav-link
          {{ trim($active) === 'siap' ? 'active disabled' : '' }}">
          Berita Acara Siap
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('Admin.permohonan') . '/diambil' }}" class="nav-link
          {{ trim($active) === 'diambil' ? 'active disabled' : '' }}">
          Berita Acara Diambil
        </a>
      </li>
    </ul>
  </nav>
</div>

</aside>
