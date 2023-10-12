<template>
    <nav class="sidebar sidebar-offcanvas"  >
                
                <ul class="nav" id="sidebar" >
                        <!-- Company section  -->
                        <li class="nav-item nav-category">Setup</li>
                        
                        <li class="nav-item" v-if="this.route_permission === 'super_admin'" >
                            <a class="nav-link" data-bs-toggle="collapse" href="#roles_setup" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">User</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="roles_setup">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link to="/roles" class="nav-link" > Roles </router-link></li>
                                <li class="nav-item"> <router-link to="/permissions" class="nav-link" > Permissions </router-link></li>
                            </ul>
                            </div>
                        </li>
                      
                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#geography" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Geography</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="geography">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link to="/geography" class="nav-link" > Overview </router-link></li>
                            </ul>
                            </div>
                        </li>
                        <li class="nav-item" v-if="this.route_permission === 'admin' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#company" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Company</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="company">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link to="/company" class="nav-link" > Company </router-link></li>
                                <!-- <li class="nav-item"> <router-link to="/organs" class="nav-link" > Business organs </router-link></li> -->
                            </ul>
                            </div>
                        </li>
                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#relations" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Stakeholder</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="relations">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link to="/leads" class="nav-link" > Leads </router-link></li>
                                <li class="nav-item"> <router-link to="/customers" class="nav-link" > Customers </router-link></li>
                                <li class="nav-item"> <router-link to="/vendors" class="nav-link" > Vendors </router-link></li>
                                <li class="nav-item"> <router-link to="/sister" class="nav-link" > Sister companies </router-link></li>
                            </ul>
                            </div>
                        </li>

                        <li class="nav-item" v-if="this.route_permission === 'admin'">
                            <a class="nav-link" data-bs-toggle="collapse" href="#humancapital" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Human capital</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="humancapital">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link class="nav-link" to="/users"> Users </router-link></li>
                                <li class="nav-item"> <router-link class="nav-link" to="/brandambassador"> Brand ambassador </router-link></li>
                                <li class="nav-item"> <router-link class="nav-link" to="/employee"> Employee </router-link></li>

                            </ul>
                            </div>
                        </li>

                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#operations" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Operations</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="operations">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link class="nav-link" to="/channels"> Channels </router-link></li>
                                <li class="nav-item"> <router-link class="nav-link" to="/products"> Products </router-link></li>

                            </ul>
                            </div>
                        </li>

                    <!-- End of setup section  -->

                    <!-- Operations section  -->
                        <li class="nav-item nav-category" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">Operations</li>
                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#experiential" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Experiential</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="experiential">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link class="nav-link" to="/trade-marketing"> Trade marketing </router-link></li>
                                <li class="nav-item"> <router-link class="nav-link" to="/events-activations"> Events & activations</router-link></li>
                                <li class="nav-item"> <router-link class="nav-link" to="/community-marketing"> Community marketing</router-link></li>
                            </ul>
                            </div>
                        </li>


                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#digitalmarketing" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Digital Marketing</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="digitalmarketing">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link class="nav-link" to="/seo"> SEO </router-link></li>
                                <li class="nav-item"> <router-link class="nav-link" to="/social-media"> Social media</router-link></li>
                            </ul>
                            </div>
                        </li>

                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#distribution" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Distribution & Logistics</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="distribution">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link class="nav-link" to="/distribution_product"> Product distribution </router-link></li>
                                <li class="nav-item"> <router-link class="nav-link" to="/distribution_service"> Service distribution</router-link></li>
                            </ul>
                            </div>
                        </li>
                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#operationreports" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Reports</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="operationreports">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <router-link class="nav-link" to="/view-tm-report"> Trade marketing </router-link></li>
                            </ul>
                            </div>
                        </li>
                    <!-- End of Operations section  -->

                        <!-- Finance section  -->
                        <li class="nav-item nav-category" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">Finance</li>
                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#pettycash" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Petty cash</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="pettycash">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Expense accounts </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Add expense </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> All expense </a></li>
                            </ul>
                            </div>
                        </li>

                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#taxreconciliation" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Tax Reconciliation</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="taxreconciliation">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Add Project </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> All Projects </a></li>
                            </ul>
                            </div>
                        </li>

                        <li class="nav-item" v-if="this.route_permission === 'admin' || this.route_permission === 'user' ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#bankrec" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Bank Reconciliation</span>
                            <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="bankrec">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Setup </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> POS system </a></li>
                            </ul>
                            </div>
                        </li>

                    <!-- End of Finance section  -->

                

                </ul>

                
            </nav>
</template>

<script> 

export default {
    created(){
        axios.get('/api/confirmation/'+this.userName)
          .then(({data})=>(
            this.route_permission = data
          ))

    },
    data(){
        return {
            route_permission:'',
            userName:localStorage.getItem('user'),
        }
    }
}




</script>
<style type="text/css">




</style>