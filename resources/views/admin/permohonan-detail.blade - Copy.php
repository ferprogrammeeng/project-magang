<x-layout>
<x-slot:active>{{ $filter ? $filter : 'permohonan' }}</x-slot>
<x-slot:page>detail</x-slot>

<main id="main" class="border shadow px-3 py-2">
  <h2 class="text-center">Detail Permohonan</h2>
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
      <div class="form-control">
        <a href="{{ $permohonan->link_syarat }}" target="_blank">{{ $permohonan->link_syarat }}</a>
      </div>
      <div class="form-control">
        <a href="{{ $permohonan->link_syarat }}" target="_blank">{{ $permohonan->link_syarat }}</a>
      </div>
    </div>
    <div class="col">
      <div>Email</div>
      <div class="form-control">{{ $permohonan->email }}</div>
      <div>Nomor HP</div>
      <div class="form-control">{{ $permohonan->no_hp }}</div>
      <div>Status</div>
      <div>
        <select id="status" class="form-control" name="status" onchange="changeUpdateBtn(this)">
          <option value="0" {{ $permohonan->status === 0 ? 'selected' : '' }}>Ditolak</option>
          <option value="1" {{ $permohonan->status === 1 ? 'selected' : '' }}>Belum ditinjau</option>
          <option value="2" {{ $permohonan->status === 2 ? 'selected' : '' }}>Proses pembuatan</option>
          <option value="3" {{ $permohonan->status === 3 ? 'selected' : '' }}>Ready bimtek</option>
          <option value="4" {{ $permohonan->status === 4 ? 'selected' : '' }}>Proses TTD</option>
        </select>
      </div>
      <div>
        @if ($permohonan->status == 0)
          <button class="btn btn-primary w-100" type="submit" data-toggle="modal" data-target="#updateDitolakModal">Update</button>
          <button class="btn btn-primary w-100 d-none" type="submit" data-toggle="modal" data-target="#updateModal">Update</button>
        @else
          <button class="btn btn-primary w-100 d-none" type="submit" data-toggle="modal" data-target="#updateDitolakModal">Update</button>
          <button class="btn btn-primary w-100" type="submit" data-toggle="modal" data-target="#updateModal">Update</button>
        @endif
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

</x-layout>
