<template>
  <div class="content-wrapper">
      <nestednav></nestednav>
      
    <div class="container">
      <div class="row mx-auto">

        <div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Alimentation</h4>
      <div class="media">
        <i class="ti-bag icon-sm text-success d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">Shops mimicking minimarts but smaller in size. Close in umudugudu</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="/rw-mt-alimentation" class="btn btn-sm btn-success form-control">View outlets</router-link>
    </div>
  </div>
</div>

<div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Minimarts</h4>
      <div class="media">
        <i class="ti-server icon-sm text-danger d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">Modern space with a wide variety of products.In shopping complexes</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="rw-gt-minimarts" class="btn btn-sm btn-danger form-control">View outlets</router-link>
    </div>
  </div>
</div>

<div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Supermarkets</h4>
      <div class="media">
        <i class="ti-printer icon-sm text-warning d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">Largest shopping complexes. In commercial centres and malls only </p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="gt-rw-supermarkets" class="btn btn-sm btn-warning form-control">View outlets</router-link>
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