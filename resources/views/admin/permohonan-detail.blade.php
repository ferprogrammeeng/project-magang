<x-layout>
<x-slot:active>{{ $filter ? $filter : 'permohonan' }}</x-slot>
<x-slot:page>detail</x-slot>

<main id="main" class="border shadow px-3 py-2">
  <h2 class="text-center">
    Detail Permohonan
    <u class="badge badge-{{ $color[$permohonan->status] }}">
      {{ $permohonan->no_resi }}
    </u>
  </h2>
  <div class="row">
    <div class="col">
      <div>Nama desa</div>
      <div class="form-control">{{ $permohonan->nama_desa }}</div>
      <div>Jenis website</div>
      <div class="form-control">{{ $permohonan->jenis_website }}</div>
      <div>Nama penanggung jawab</div>
      <div class="form-control">{{ $permohonan->nama_pj }}</div>
      <div>Nama perwakilan</div>
      <div class="form-control">{{ $permohonan->nama_wakil }}</div>
      <div>Link berkas persyaratan</div>
      <div class="row row-cols-sm-1 row-cols-md-6">
        @if ($permohonan->jenis_website === 'OPD')
          <a class="col btn btn-outline-dark mx-2" target="_blank"
            href="../../syarat/{{ $permohonan->no_resi }}/syarat.pdf?dl=1">
            Syarat
          </a>
        @elseif ($permohonan->jenis_website === 'Desa')
          @for ($i=1; $i<=5; $i++)
            <a class="col btn btn-outline-dark mx-2" target="_blank"
              href="../../syarat/{{ $permohonan->no_resi }}/syarat-{{ $i }}.pdf">
              Syarat {{ $i }}
            </a>
          @endfor
        @endif
      </div>
      @if ($permohonan->status == 5)
        <div>Lihat berita acara</div>
        <div class="row row-cols-sm-1 row-cols-md-4">
          <a class="col btn btn-outline-dark mx-2" target="_blank"
            href="../../berita-acara/{{ $permohonan->no_resi }}/berita-acara.pdf">
            Berita acara
          </a>
        </div>
      @endif
    </div>
    <div class="col">
      <div>Email</div>
      <div class="form-control">{{ $permohonan->email }}</div>
      <div>Nomor HP</div>
      <div class="form-control">{{ $permohonan->no_hp }}</div>
      <div>Status</div>
      <div>
        <select id="status" class="form-control" name="status" onchange="changeUpdateBtn(this)">
        @for ($i=0; $i<7; $i++)
          @if ($i >= $permohonan->status)
            <option value="{{ $i }}" {{ $permohonan->status === $i ? 'selected' : '' }}>
              {{ $status_text[$i] }}
            </option>
          @endif
        @endfor
        </select>
      </div>
      <div>
        <button class="btn btn-primary w-100" type="submit"
          data-toggle="modal" data-target="#update{{ $target }}Modal">
          Update
        </button>
      </div>
    </div>
  </div>

</main>


<!-- modal -->
<div class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Yakin ingin mengupdate?</h5>
      </div>
      <div class="modal-footer">
        <form action="{{ route('Admin.permohonan-update', $permohonan->id) }}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $permohonan->id }}" />
          <input type="hidden" name="nama_pj" value="{{ $permohonan->nama_pj }}" />
          <input type="hidden" name="email" value="{{ $permohonan->email }}" />
          <input type="hidden" name="status" />
          <button type="submit" class="btn btn-primary">Ya</button>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- modal END -->


<!-- modal ditolak -->
<div class="modal fade" id="updateDitolakModal" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alasan permohonan ditolak</h5>
      </div>
      <form action="{{ route('Admin.permohonan-update', $permohonan->id) }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $permohonan->id }}" />
        <input type="hidden" name="nama_pj" value="{{ $permohonan->nama_pj }}" />
        <input type="hidden" name="email" value="{{ $permohonan->email }}" />
        <input type="hidden" name="status" />
        <div class="modal-body">
          <textarea class="form-control" name="message" placeholder="Tuliskan pesan disini untuk dirikim via email"></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal ditolak END -->


<!-- modal bimtek -->
<div class="modal fade" id="updateBASiapModal" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Yakin ingin mengupdate</h5>
      </div>
      <form action="{{ route('Admin.permohonan-update', $permohonan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $permohonan->id }}" />
        <input type="hidden" name="nama_wakil" value="{{ $permohonan->nama_wakil }}" />
        <input type="hidden" name="email" value="{{ $permohonan->email }}" />
        <input type="hidden" name="no_resi" value="{{ $permohonan->no_resi }}" />
        <input type="hidden" name="status" />
        <div class="modal-body">
          <label class="form-label">Upload berita acara</label>
          <input class="form-control" type="file" name="berita_acara" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal bimtek END -->

</x-layout>
