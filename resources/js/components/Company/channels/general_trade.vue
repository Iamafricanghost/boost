<template>
  <div class="content-wrapper">
      <nestednav></nestednav>
      
    <div class="container">
      <div class="row mx-auto">

<div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Rwanda</h4>
      <div class="media">
        <i class="ti-bag icon-sm text-success d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">View general trade outlet types in Rwanda</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="/gt-rwanda" class="btn btn-sm btn-success form-control">View</router-link>
    </div>
  </div>
</div>

<div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Kenya</h4>
      <div class="media">
        <i class="ti-server icon-sm text-danger d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">View general trade outlet types in Kenya</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="/general-trade" class="btn btn-sm btn-danger form-control">View</router-link>
    </div>
  </div>
</div>






</div>
    </div>
      

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import nestednav from '../nestednav/nested.vue';
// import indexproject from './index.vue';


export default{
  components:{
    'nestednav':nestednav,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>