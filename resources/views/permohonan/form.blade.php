<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Form</title>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" /> -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>
<body>

<!-- <iframe class="border border-danger" src="https://www.dropbox.com/s/m89v0da785904x3/syarat-1.pdf" width="600px" height="400px"></iframe> -->

<div class="container">
  <main id="main" class="container rounded shadow-lg my-3 px-3 py-2">

  <h3 class="text-center text-white mt-2 mb-3">Diskominfo Kabupaten Kampar</h3>
  <div>
    <img class="mx-auto d-block rounded-circle"
      src="{{ asset('img/kominfo.png') }}" alt="dinas kominfo kampar"
      width="200px" height="200px" draggable="false" />
  </div>

  <form action="{{ route('Permohonan.tambah') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label" for="jenis_website">Jenis Website</label>
      {{ old('jenis_website') }}
      <select class="form-select" name="jenis_website" id="jenis_website">
        <option value="Desa"
          {{ old('jenis_website') === 'Desa' ? 'selected' : '' }}>
          Desa
        </option>
        <option value="OPD"
          {{ old('jenis_website') === 'OPD' ? 'selected' : '' }}>
          OPD
        </option>
      </select>
      @error('jenis_website')
        <div class="text-danger"><i>{{ $message }}</i></div>
      @enderror
    </div>

    <!-- anonymous component "<x-..." terletak di resources/views/components/ -->
    <x-input id="nama_desa" label="Nama Desa" type="text" />

    <h4 class="mt-4">Persyaratan</h4>
    <div class="mb-3" id="syarat"></div>

    <x-input type="text"   id="nama_pj"       label="Nama Penanggung Jawab">**Jika Kades/Kadis/Kaban tidak dapat menanda tangani berita acara</x-input>
    <x-input type="number" id="nip_pj"        label="NIP Penaggung Jawab" />
    <x-input type="text"   id="nama_wakil"    label="Nama Perwakilan">**Jika Kades/Kadis/Kaban tidak dapat menanda tangani berita acara</x-input>
    <x-input type="number" id="nip_wakil"     label="NIP Perwakilan" />
    <x-input type="text"   id="jabatan_wakil" label="Jabatan Perwakilan" />
    <x-input type="text"   id="pangkat_wakil" label="Pangkat/Golongan" />
    <x-input type="email"  id="email"         label="Email Aktif Pemohon" />
    <x-input type="number" id="no_hp"         label="No HP Pemohon" />

    <button type="submit" class="btn btn-primary mb-2 px-4 py-2" onsubmit="preventDefault()">Kirim</button>
  </form>

  </main>
</div>


<!-- dependencies script -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  -->

<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
<!-- dependencies script END -->


<!-- custom script -->
<script>
  const baseURL = "{{ route('Permohonan.cek_resi', '') }}";
  // ganti berkas yang diperlukan berdasarkan jenis website
  const desaInner = `
    <x-input type="file" id="syarat[sk_kades]"     label="SK Pengangkatan Kepala Desa" />
    <x-input type="file" id="syarat[sk_perangkat]" label="SK Pengangkatan Perangkat Desa" />
    <x-input type="file" id="syarat[s_kuasa]"      label="Surat kuasa dari Kepala Desa">**Berstempel basah dan tanpa materai</x-input>
    <x-input type="file" id="syarat[s_permohonan]" label="Surat Permohonan">**Berstempel basah</x-input>
    <x-input type="file" id="syarat[ktp]"          label="KTP Perangkat yang ditunjuk" />    
    <x-input type="number" id="kode_pos" label="Kode Pos" />
  `;
  const opdInner = `
    <x-input type="file" id="syarat[opd]" label="Syarat OPD" />
  `;
</script>

<script src="{{ asset('js/script.js') }}"></script>


@if ($errors->first())
  <x-alert msg="{{ $errors->first() }}" type="warning" color="#f7dada" />
@endif

@if (session('alert'))
  <x-alert msg="{{ session('alert')['msg'] }}" type="{{ session('alert')['type'] }}" color="#daf7da" />
@endif

<!-- custom script END -->


</body>
</html>
