<template>
  <div class="content-wrapper">
      <div class="container-fluid">
        <nestednav></nestednav> 

      <div class="row">

          <indexcustomer></indexcustomer>
          <createcustomer></createcustomer>


          
      </div>
      </div>

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createcustomer from './create.vue';
import indexcustomer from './index.vue';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';


export default{
  components:{
    'createcustomer':createcustomer,
    'indexcustomer':indexcustomer,
    'nestednav':nestednav,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>