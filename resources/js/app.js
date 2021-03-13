// require('./bootstrap');
//
// require('alpinejs');
import Swal from 'sweetalert2'
import Turbolinks from 'turbolinks'

window.addEventListener('swal',function(e){
    Swal.fire(e.detail);
});
window.swal = Swal;
// Turbolinks.start()
