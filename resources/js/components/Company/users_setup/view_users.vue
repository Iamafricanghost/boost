<template>
  <div class="content-wrapper" >
      <div class="container" v-if="this.userRole === 'admin'">
        <nestednav></nestednav> 

      <div class="row">
          <index></index>
          <create></create>
      </div>
      </div>

      <not_permitted v-else></not_permitted> 

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import create from './create.vue';
import index from './index.vue';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import not_permitted from '../not_permitted.vue';


export default{
  components:{
    'create':create,
    'index':index,
    'nestednav':nestednav,
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