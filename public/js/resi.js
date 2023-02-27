const inputResi = document.getElementById('input-resi');
const cekResiBtn = document.getElementById('cek-resi-btn');
const modalResi = document.querySelector('.modal-header h6 span');
const modalBody = document.querySelectorAll('.modal-body');

const month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
  'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

const statusObj = [
  { color: 'danger',    text: 'Ditolak' },
  { color: 'warning',   text: 'Belum ditinjau' },
  { color: 'primary',   text: 'Diterima, berkas belum lengkap' },
  { color: 'secondary', text: 'Lengkap, belum bisa diambil' },
  { color: 'success',   text: 'Berkas sudah lengkap, berita acara dapat diambil' },
  { color: 'white',     text: 'Berita acara sudah diambil' },
  { color: 'white',     text: 'Ready bimtek' },
  { color: 'white',     text: 'Proses TTD Kadis' },
];

cekResiBtn.onclick = showResi;
inputResi.onkeydown = function(event) {
  if (this.value.length !== 18) return;
  if (event.key === 'Enter') cekResiBtn.click();
}
inputResi.oninput = function(event) {
  if (this.value.length !== 18) {
    cekResiBtn.classList.add('disabled');
  } else {
    cekResiBtn.classList.remove('disabled');
  }
}


function modalRow(text1, text2) {
  return `<div class="row">
    <div class="col">${text1}</div>
    <div class="col">: ${text2}</div>
  </div>`;
}


async function showResi() {
  const response = await fetch(`${baseURL}/${inputResi.value}`);
  const result = await response.json();

  const { nama_desa, jenis_website, nama_pj, nama_wakil,
    email, no_hp, status, riwayat, created_at } = result;
  const date = new Date(created_at);
  const tgl = `
    ${date.getDate()} ${month[date.getMonth()]} ${date.getFullYear()} -
    ${date.getHours()}:${date.getMinutes()}
  `;

  modalResi.innerText = inputResi.value;

  const leftContent = modalRow('Nama desa', nama_desa)
    + modalRow('Jenis website', jenis_website)
    + modalRow('Nama penanggung jawab', nama_pj)
    + modalRow('Nama perwakilan', nama_wakil)
    + modalRow('Email', email)
    + modalRow('No HP', no_hp)
    + modalRow('Diajukan pada', tgl)
    + `<div class="row mx-0 mt-1 p-3 fs-5 bg-${statusObj[status].color}">
      <b class="text-center">${statusObj[status].text}</b>
    </div>`;

  modalBody[0].innerHTML = leftContent;

  const riwayatObj = JSON.parse(riwayat);
  let rightContent = '';
  for (const key in riwayatObj) {
    rightContent += `<li>
      <span>${riwayatObj[key]}</span>
      <span>${key}</span>
    </li>`;
  }

  modalBody[1].innerHTML = `<ul>${rightContent}</ul>`;
}
