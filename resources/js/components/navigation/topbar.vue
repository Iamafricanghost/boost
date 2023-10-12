<template>
                <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row" id="topbar" >
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start" >
                                <div class="me-3">
                                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                                        <span class="icon-menu"></span>
                                    </button>
                                    </div>
                                    <div>
                                        <!-- './backend/'  -->

                                    <a class="navbar-brand brand-logo" :href="'/home'">
                                        <img :src="'./backend/images/logo.png'" alt="logo" />
                                    </a>
                                    <a class="navbar-brand brand-logo-mini" :href="'/home'">
                                        <img :src="'./backend/images/logo.png'" alt="logo" />
                                    </a>
                                    </div>
                                </div>

                        <div class="navbar-menu-wrapper d-flex align-items-top" > 

                

                        <ul class="navbar-nav">
                            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                                <h1 class="welcome-text">Jambo! <strong class="text-capitalize">{{ userName }}</strong> </h1>
                                <h3 class="welcome-sub-text h3" >We are glad you are here today ... </h3>
                            </li>
                            </ul>

                        <!-- <div v-if="$route.path != '/'">
                            <div v-if="$route.path != '/register'">

                            </div>
                        </div> -->

                        <ul class="navbar-nav ms-auto" id="sidebar">

                            <li class="nav-item d-none d-lg-block">
                                <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                                <span class="input-group-addon input-group-prepend border-right">
                                    <span class="icon-calendar input-group-text calendar-icon"></span>
                                </span>
                                <input type="text" class="form-control">
                                </div>
                            </li>
                            
                            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                                
                                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle" :src="'./backend/images/faces/face8.jpg'" alt="Profile image"> </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle" :src="'./backend/images/faces/face8.jpg'" alt="Profile image">
                                    <p class="mb-1 mt-3 font-weight-semibold">{{this.userName}}</p>
                                    <p class="fw-light text-muted mb-0">{{this.email}}</p>
                                </div>
                                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-cellphone text-primary me-2"></i> {{this.phone}}</a>
                                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-convert text-primary me-2"></i> {{this.status}}</a>
                                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> {{this.company_name}}</a>
                                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account text-primary me-2"></i> {{this.role}}</a>
                                <router-link class="dropdown-item" to="/logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</router-link>
                                </div>
                            </li>
                            </ul>
                            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                            <span class="mdi mdi-menu"></span> 
                            </button>


                        </div>
                </nav>
</template>
<script>

export default{
    created(){
       
        },
        data(){
          return{
            userName:localStorage.getItem("user"),
            email:localStorage.getItem("email"),
            phone:localStorage.getItem("phone"),
            status:localStorage.getItem("status"),
            company_name:localStorage.getItem("company_name"),
            role:localStorage.getItem("role"),
          }
        },
}



</script>
<style>
.welcome-sub-text{
    font-size: 12px !important;
}

</style>