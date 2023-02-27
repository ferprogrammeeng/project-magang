<!DOCTYPE html>
<html>
<head>
  <title>This is title</title>
</head>
<body>

<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_of_Ministry_of_Communication_and_Information_Technology_of_the_Republic_of_Indonesia.svg/512px-Logo_of_Ministry_of_Communication_and_Information_Technology_of_the_Republic_of_Indonesia.svg.png" width="300" height="300" />

<p>{{ $d_time }}</p>

<h3>Selamat {{ $waktu }}, {{ $name }}.</h3>

<p>Permohonan Anda berhasil dibuat. Gunakan nomor resi berikut untuk mengecek status permohonan.</p>
<b>No resi: {{ $resi }}</b>
<p>Untuk mengecek status permohonan dapat mengunjungi link berikut.</p>
<a href="http://localhost/project-magang/public/permohonan/cek_resi" target="_blank">
  <button>Cek Resi</button>
</a>

<p>Demikian pesan ini kami sampaikan. Atas perhatian saudara, kami mengucapkan terima kasih.</p>

</body>
</html>