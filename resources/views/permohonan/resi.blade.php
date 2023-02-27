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

<div class="vh-100 d-flex">
  <main id="main" class="d-grid rounded shadow-lg p-3 m-auto">
    <h3 class="text-center text-white mb-2">Cek Resi Permohonan</h3>
    <div class="input-group mb-2">
      <span class="input-group-text">Nomor resi</span>
      <input id="input-resi" type="text" class="form-control"
        placeholder="P-1234567890123456" autofocus />
    </div>
    <button id="cek-resi-btn" type="button"
      class="btn btn-primary d-blok disabled"
      data-bs-toggle="modal"
      data-bs-target="#detail-resi">
      Cek
    </button>
  </main>
</div>


<!-- modal -->
<div class="modal fade mt-4" id="detail-resi" tabindex="-1">
  <div class="modal-dialog d-flex" style="--bs-modal-width: 1000px">
    <div class="modal-content me-1">
      <div class="modal-header flex-column">
        <div class="d-flex justify-content-between align-items-center w-100">
          <h4 class="modal-title">Status permohonan</h4>
        </div>
        <h6 class="text-left w-100">Nomor resi: <span>P-1674780015230127</span></h6>
      </div>
      <div class="modal-body"></div>
    </div>

    <div class="modal-content ms-1">
      <div class="modal-header flex-column">
        <div class="d-flex justify-content-between align-items-center w-100">
          <h4 class="modal-title">Timeline</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
      </div>
      <div class="modal-body fs-5"></div>
    </div>
  </div>
</div>
<!-- modal END -->


<!-- dependencies script -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  -->

<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
<!-- dependencies script END -->


<!-- custom script -->
<script>
  const baseURL = "{{ route('Permohonan.cek_resi', '') }}";
</script>
<script src="{{ asset('js/resi.js') }}"></script>
<!-- custom script END -->


</body>
</html>
