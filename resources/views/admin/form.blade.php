<!DOCTYPE html>
<html>
<head>

<title>Login</title>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" /> -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

<style>*{font-size: 1.1rem}</style>

</head>
<body class="d-flex vh-100">

<div class="container d-flex">
  <main id="main" class="container rounded shadow-lg m-auto px-3 py-2 w-50">
    <h3 class="text-center text-white mt-2 mb-3">Login sebagai Admin</h3>
    <form action="{{ route('Admin.login') }}" method="POST" class="d-flex flex-column">
      @csrf
      <div class="input-group mb-2">
        <span class="input-group-text"><label for="username">Username</label></span>
        <input class="form-control" type="text" id="username" name="username" required autofocus />
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text"><label for="password">Password</label></span>
        <input class="form-control" type="password" id="password" name="password" required />
      </div>
      <button class="btn btn-primary mb-2 mx-auto px-4 py-2" type="submit">Login</button>
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
<script src="{{ asset('js/script.js') }}"></script>

@if (session('alert'))
  <script>
  swAlert(
    "{{ session('alert')['msg'] }}",
    "{{ session('alert')['type'] }}",
    "#f7dada"
  );
  </script>
@endif
<!-- custom script END -->

</body>
</html>
