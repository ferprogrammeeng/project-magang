const selectJenis = document.getElementById('jenis_website');
const namaDesa = document.getElementById('nama_desa');
const syarat = document.getElementById('syarat');
const inputs = document.querySelectorAll('input');


window.onload = () => selectJenis.onchange();


selectJenis.onchange = function() {
  const title = namaDesa.parentNode.children[0].children[0];
  if (this.value === 'Desa') {
    title.innerText = 'Nama Desa';
    syarat.innerHTML = desaInner;
  } else {
    title.innerText = 'Nama OPD';
    syarat.innerHTML = opdInner;
  }  
}


inputs.forEach(input => {
  input.oninput = function(event) {
    this.setCustomValidity('');
  }
});


function swAlert(text='', icon='', background='#daf7da', timer=2000) {
  Swal.fire({
    backdrop: 'rgba(30, 30, 150, .6)',
    color: '#54b',
    position: 'top',
    background, icon, text, timer,
    timerProgressBar: true,
  });
  document.getElementById('swal2-html-container')
    .style.fontSize = '1.6em';
}


function validate(element) {
  const types = { number: 'angka', text: 'huruf', email: 'email' };
  const { min, max, minlength, maxlength, type, validity } = element;

  const messages = {
    valueMissing: 'wajib diisi!',
    patternMismatch: `hanya boleh mengandung {types[type]}!`,
    rangeOverflow: `maksimal bernilai ${max}!`,
    rangeUnderflow: `maksimal bernilai ${min}!`,
    tooLong: `tidak boleh lebih dari ${maxlength} karakter!`,
    tooShort: `tidak boleh kurang dari ${minlength} karakter!`,
    typeMismatch: `harus berupa {types[type]}`,
  };
  let msg = `${element.dataset.name} `;

  for (const i in validity) {
    if (validity[i]) {
      msg += messages[i];
      break;
    }
  }

  element.setCustomValidity(msg);
  swAlert(msg, 'warning', '#f7d0d0', 1000);
}

