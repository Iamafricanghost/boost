<template>
  <div class="content-wrapper">
      <div class="container" v-if="this.userRole === 'super_admin'">
        <nestednav></nestednav> 

      <div class="row">
          <indexrole></indexrole>
          <createrole></createrole>  
      </div>
      </div>
      <not_permitted v-else></not_permitted> 



  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createrole from './create.vue';
import indexrole from './index.vue';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import not_permitted from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/not_permitted.vue';


export default{
  components:{
    'createrole':createrole,
    'indexrole':indexrole,
    'nestednav':nestednav,
    'not_permitted':not_permitted,
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