<x-layout>
<x-slot:active>{{ $filter ? $filter : 'permohonan' }}</x-slot>
<x-slot:page></x-slot>

<main id="main" class="border shadow px-3 pt-2">
  <h2 class="text-center">Daftar permohonan {{ $filter }}</h2>
  <div class="d-flex flex-column mb-3 table-wrapper">
    <div class="container head">
      <div class="row bg-primary">
        <div class="col col-1">No</div>
        <div class="col col-md-3 col-sm-2">Nama pemohon</div>
        <div class="col col-3">Nama desa</div>
        <div class="col col-1">Jenis</div>
        <div class="col col-md-2 col-sm-3">Tanggal pengajuan</div>
        <div class="col col-2">Status</div>
      </div>
    </div>

    <div class="container body overflow-scroll">
      @foreach ($permohonan as $p)
        <div class="row bg-light">
          <div class="col col-1">
          {{ $loop->iteration }}
          </div>
          <div class="col col-md-3 col-sm-2">
            {{ $p->nama_wakil }}
          </div>
          <div class="col col-3">
            {{ $p->nama_desa }}
          </div>
          <div class="col col-1">
            {{ $p->jenis_website }}
          </div>
          <div class="col col-md-2 col-sm-3">
            {{ date('d-m-Y', strtotime($p->created_at)) }}
          </div>
          <div class="col col-2 bg-{{ $status[$p->status][0] }}" data-id="{{ $p->id }}">
            {{ $status[$p->status][1] }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</main>

</x-layout>