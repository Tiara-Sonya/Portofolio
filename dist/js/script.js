// Navbar Fixed
window.onscroll = function (){
  const header = document.querySelector('header');
  const fivedNav = header.offsetTop;

  if(window.pageYOffset > fixedNav ) {
    header.classList.add('navbar-fixed');
  } else {
    header.classList.remove('navbar-fixed');
  }
};

const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-Menu');

hamburger .addEventListener('click', function(){
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});


// Formulir Tambah Data
function toggleForm() {
    var formTambah = document.getElementById("formTambah");
    formTambah.classList.toggle("show");
  
    var tambahBtnIcon = document.getElementById("tambahBtnIcon");
    tambahBtnIcon.classList.toggle("fa-plus");
    tambahBtnIcon.classList.toggle("fa-minus");
  }
  
  // Hapus data satu-satu
  function confirmDelete() {
    return confirm("Apakah Anda yakin ingin menghapus data ini?");
  }

