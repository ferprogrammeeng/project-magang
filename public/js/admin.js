const dashboardBtn = document.querySelectorAll('.dashboard .row > a');
const detailBtn = document.querySelectorAll('.col[class*=bg]');
const modalBtn = document.querySelector('button[data-target="#updateModal"]');
const modalDitolakBtn = document.querySelector('button[data-target="#updateDitolakModal"]');
const select = document.querySelector('select[name=status]');
const status = document.querySelectorAll('form input[name=status]');

dashboardBtn?.forEach(btn => {
  btn.className = 'col btn btn-warning';
});

detailBtn.forEach(btn => {
  btn.onclick = function() {
    const id = this.dataset.id;
    document.location.href = `${baseURL}/${id}`;
  };
});

modalBtn.onclick = () => {
  status.forEach(s => s.value = select.value)
}
modalDitolakBtn.onclick = () => {
  status.forEach(s => s.value = select.value)
}


function changeUpdateBtn(el) {
  if (el.value == 0) {
    modalBtn.classList.add('d-none');
    modalDitolakBtn.classList.remove('d-none');
  } else {
    modalBtn.classList.remove('d-none');
    modalDitolakBtn.classList.add('d-none');
  }
}


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
