// require('./bootstrap');
//
// require('alpinejs');
import Swal from 'sweetalert2'
window.addEventListener('swal',function(e){
    Swal.fire(e.detail);
});
window.swal = Swal;
