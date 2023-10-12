<template>
  <div class="content-wrapper">
    <nestednav v-if="this.userRole === 'admin'"></nestednav> 
      <div class="container-fluid" v-if="this.userRole === 'admin'">

      <div class="row">
          <indexcompany></indexcompany>
          <createcompany></createcompany>

          
      </div>
      </div>

      <not_permitted v-else></not_permitted> 

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createcompany from './create.vue';
import indexcompany from './index.vue';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import not_permitted from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/not_permitted.vue';


export default{
  components:{
    'createcompany':createcompany,
    'indexcompany':indexcompany,
    'not_permitted':not_permitted,
    'nestednav':nestednav,
  },
 
  data(){
    return{
      userRole: localStorage.getItem('role')
    }
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>