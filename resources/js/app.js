require('./bootstrap')

import Vue from 'vue'
import VueRouter from 'vue-router'
import moment from 'moment'

Vue.use(VueRouter)

//Router Imported 
import{routes} from './routes';

//Import user class
import User from './Helpers/User';
window.User = User


//Import Notification class
import Notification from './Helpers/Notification';
window.Notification = Notification



// ES6 Modules or TypeScript - Sweet alert
import Swal from 'sweetalert2'
window.Swal = Swal

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;

// End of sweet alert code

window.Reload = new Vue();

 const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'history'
  })

const app = new Vue({
    el: '#app',
    router
});

Vue.filter('myDate',function(created){
  return moment(created).format('MMMM Do YYYY');
});






 