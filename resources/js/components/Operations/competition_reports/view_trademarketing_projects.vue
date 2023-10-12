<template>
  <div class="content-wrapper">
    <nestednav></nestednav>

      <div class="container">
        <div class="row">
          <indexproject></indexproject>
          <createproject></createproject>
          </div>
      </div>

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createproject from './create.vue';
import indexproject from './index.vue';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';


export default{
  components:{
    'createproject':createproject,
    'indexproject':indexproject,
    'nestednav':nestednav,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>