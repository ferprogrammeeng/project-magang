const dashboardBtn = document.querySelectorAll('.dashboard .row > a');
const detailBtn = document.querySelectorAll('.col[class*=bg]');
const modalBtn = document.querySelector('button[data-target^="#update"]');
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

if (modalBtn) modalBtn.onclick = () => {
  status.forEach(s => (s.value = select.value));
}


function changeUpdateBtn(el) {
  const target = ({
    0: '#updateDitolakModal',
    5: '#updateBASiapModal'
  })[el.value] ?? '#updateModal';
console.log(target)
  modalBtn.dataset.target = target;
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
