<template>
  <div class="content-wrapper">
      <div class="container-fluid" v-if="this.userRole === 'admin'">
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

          <indexemployee></indexemployee>
          <createemployee></createemployee>


          
      </div>
      </div>
      <not_permitted v-else></not_permitted> 

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createemployee from './create.vue';
import indexemployee from './index.vue';
import not_permitted from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/not_permitted.vue';


export default{
  components:{
    'createemployee':createemployee,
    'indexemployee':indexemployee,
    'not_permitted':not_permitted,
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