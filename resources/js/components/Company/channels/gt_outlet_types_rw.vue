<template>
  <div class="content-wrapper">
      <nestednav></nestednav>
      
    <div class="container">
      <div class="row mx-auto">

        <div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Boutiques</h4>
      <div class="media">
        <i class="ti-bag icon-sm text-success d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">Small shops next to neighbourhoods. Would otherwise be called kyosk</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="/rw-gt-boutiques" class="btn btn-sm btn-success form-control">View</router-link>
    </div>
  </div>
</div>

<div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Kabales</h4>
      <div class="media">
        <i class="ti-server icon-sm text-danger d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">Small bars in umudugudu(Village)</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="rw-gt-kabales" class="btn btn-sm btn-danger form-control">View</router-link>
    </div>
  </div>
</div>

<div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Wholesalers</h4>
      <div class="media">
        <i class="ti-printer icon-sm text-warning d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">Wholesalers in markets or commercial zones. </p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="gt-rw-wholesalers" class="btn btn-sm btn-warning form-control">View</router-link>
    </div>
  </div>
</div>

<div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Hardware stores</h4>
      <div class="media">
        <i class="ti-harddrive icon-sm text-info d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text">Store construction materials. Otherwise known as quincaillerie</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="rw-gt-hardware" class="btn btn-sm btn-info form-control">View</router-link>
    </div>
  </div>
</div>

<div class="col-md-3 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Bars</h4>
      <div class="media">
        <i class="ti-harddrives icon-sm text-primary d-flex align-self-start me-3"></i>
        <div class="media-body">
          <p class="card-text"> Typical bar stocking beers and other beverages</p>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <router-link to="rw-gt-bars" class="btn btn-sm btn-primary form-control">View</router-link>
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