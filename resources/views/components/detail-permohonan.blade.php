<main id="main" class="border shadow px-3 py-2">
  <h2 class="text-center">Detail Permohonan</h2>
  <div class="container mb-3">
    <div class="row">
      <div class="col-3">Nama desa</div>
      <div class="col">: {{ $permohonan->nama_desa }}</div>
    </div>
    <div class="row">
      <div class="col-3">Jenis website</div>
      <div class="col">: {{ $permohonan->jenis_website }}</div>
    </div>
    <div class="row">
      <div class="col-3">Nama penanggung jawab</div>
      <div class="col">: {{ $permohonan->nama_pj }}</div>
    </div>
    <div class="row">
      <div class="col-3">Nama perwakilan</div>
      <div class="col">: {{ $permohonan->nama_wakil }}</div>
    </div>
    <div class="row">
      <div class="col-3">Email</div>
      <div class="col">: {{ $permohonan->email }}</div>
    </div>
    <div class="row">
      <div class="col-3">Nomor HP</div>
      <div class="col">: {{ $permohonan->no_hp }}</div>
    </div>
  </div>

  <form class="w-50 mx-auto" action="{{ route('Admin.permohonan-update', $permohonan->id) }}" method="post">
    @csrf
    <div class="d-flex px-3 py-2">
      <div class="input-group">
        <span class="input-group-text"><label for="status" class="my-auto">Status</label></span>
        <select id="status" class="form-control" name="status">
          <option value="0" {{ $permohonan->status === 0 ? 'selected' : '' }}>Ditolak</option>
          <option value="1" {{ $permohonan->status === 1 ? 'selected' : '' }}>Belum ditinjau</option>
          <option value="2" {{ $permohonan->status === 2 ? 'selected' : '' }}>Diterima, belum lengkap</option>
          <option value="3" {{ $permohonan->status === 3 ? 'selected' : '' }}>Berkas lengkap, belum bisa diambil</option>
          <option value="4" {{ $permohonan->status === 4 ? 'selected' : '' }}>BA Siap diambil</option>
          <option value="5" {{ $permohonan->status === 5 ? 'selected' : '' }}>BA Sudah diambil</option>
          <option value="6" {{ $permohonan->status === 6 ? 'selected' : '' }}>Ready Bimtek</option>
          <option value="7" {{ $permohonan->status === 7 ? 'selected' : '' }}>Proses TTD Kadis</option>
          <option value="8" {{ $permohonan->status === 8 ? 'selected' : '' }}>Proses Pembuatan</option>
        </select>
        <input type="hidden" name="email" value="{{ $permohonan->email }}" />
        <button class="btn btn-primary ml-2" type="submit">Update</button>
      </div>
    </div>
  </form>
</main>
