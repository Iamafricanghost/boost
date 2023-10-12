<template>
  <div class="content-wrapper">
    <nestednav v-if="this.userRole === 'admin'"></nestednav> 
      <div class="container-fluid"  v-if="this.userRole === 'admin'">
        <div class="row">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                  <!-- <li class="breadcrumb-item"><router-link to="/organ-assign">Assign</router-link></li> -->
                  <li class="breadcrumb-item" @click="$router.go(-1)">Back</li>
              </ol>
           </nav>
      </div>

      <div class="row">

          <indexsister></indexsister>
          <createsister></createsister>


          
      </div>
      </div>
      <not_permitted v-else></not_permitted>  

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createsister from './create.vue';
import indexsister from './index.vue';
import not_permitted from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/not_permitted.vue';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';


export default{
  components:{
    'createsister':createsister,
    'indexsister':indexsister,
    'not_permitted':not_permitted,
    'nestednav':nestednav,
  },
  data(){
    return {
      userRole: localStorage.getItem('role')
    }
  }


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>