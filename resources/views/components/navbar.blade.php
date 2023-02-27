<!-- navbar -->
<nav class="main-header navbar navbar-expand navbar-light bg-primary">
  <ul class="navbar-nav w-100 justify-content-between">
    <li class="d-none d-sm-inline-block">
      @if (trim($page) === 'detail')
        <a href="{{ route('Admin.permohonan') }}" class="btn btn-primary">
          Kembali
        </a>
      @endif
    </li>

    <li class="d-none d-sm-inline-block">
      <a href="{{ route('Admin.logout') }}" class="btn btn-danger">
        Logout
      </a>
    </li>
  </ul>
</nav>
<!-- navbar END -->
