
import TopBar from './components/navigation/topbar.vue';
import SideBar from './components/navigation/SideBar.vue';

// Authentication routes 
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget_password = require('./components/auth/forget_password.vue').default;
let logout = require('./components/auth/logout.vue').default;

//End of authentication routes

//Home route
let home = require('./components/dashboard/home.vue').default;

//Employee routes
let storeemployee = require('./components/HR modules/Employees/create.vue').default;
let employee = require('./components/HR modules/Employees/index.vue').default;
let editemployee = require('./components/HR modules/Employees/edit.vue').default;

//Merchandiser routes
let storemerchandiser = require('./components/HR modules/Merchandiser/create.vue').default;
let merchandiser = require('./components/HR modules/Merchandiser/index.vue').default;
let editmerchandiser = require('./components/HR modules/Merchandiser/edit.vue').default;

//Currency routes
let storecurrency = require('./components/Company/Geography/currency_create.vue').default;
let currency = require('./components/Company/Geography/currency_index.vue').default;
let editcurrency = require('./components/Company/Geography/currency_edit.vue').default;

//Currency routes
let storecountry = require('./components/Company/Geography/country_create.vue').default;
let country = require('./components/Company/Geography/country_index.vue').default;
let editcountry = require('./components/Company/Geography/country_edit.vue').default;

export const routes = [
    { path: '/', name:'/', component:login},
    { path: '/register', component: register , name:'register'},
    { path: '/forget_password', component: forget_password , name:'forget_password'},
    { path: '/logout', component: logout , name:'logout'},

    //Remember to add named router views as components for the following non-authentication routes
    { path: '/home', components: {default:home,'topBar':TopBar,'sideBar':SideBar} , name:'home'},
    { path: '/store-employee', components: {default:storeemployee,'topBar':TopBar,'sideBar':SideBar} , name:'store-employee'},
    { path: '/employee', components: {default:employee,'topBar':TopBar,'sideBar':SideBar} , name:'employee'},
    { path: '/edit-employee/:id', components: {default:editemployee,'topBar':TopBar,'sideBar':SideBar} , name:'edit-employee'},

    //Merchandiser routes
    { path: '/store-merchandiser', components: {default:storemerchandiser,'topBar':TopBar,'sideBar':SideBar} , name:'store-merchandiser'},
    { path: '/merchandiser', components: {default:merchandiser,'topBar':TopBar,'sideBar':SideBar} , name:'merchandiser'},
    { path: '/edit-merchandiser/:id', components: {default:editmerchandiser,'topBar':TopBar,'sideBar':SideBar} , name:'edit-merchandiser'},

    //Currency routes
    { path: '/store-currency', components: {default:storecurrency,'topBar':TopBar,'sideBar':SideBar} , name:'store-currency'},
    { path: '/currency', components: {default:currency,'topBar':TopBar,'sideBar':SideBar} , name:'currency'},
    { path: '/edit-currency/:id', components: {default:editcurrency,'topBar':TopBar,'sideBar':SideBar} , name:'edit-currency'},


    //Country routes
    { path: '/store-country', components: {default:storecountry,'topBar':TopBar,'sideBar':SideBar} , name:'store-country'},
    { path: '/country', components: {default:country,'topBar':TopBar,'sideBar':SideBar} , name:'country'},
    { path: '/edit-country/:id', components: {default:editcountry,'topBar':TopBar,'sideBar':SideBar} , name:'edit-country'},

  ]