<template>
  <div class="tab-pane fade" id="product_brands" role="tabpanel">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product brands</h4> 
                  <p class="card-description">
                    This is the section you create and manage product brands.
                  </p>
                  <p>
                     If you have created or your product brand already exists, you proceed to product variants.
                  </p>
                </div>
              </div>
            </div>

      </div>

      <div class="row">
          <indexbrand></indexbrand>
          <createbrand></createbrand>     
      </div>



  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createbrand from './create.vue';
import indexbrand from './index.vue';


export default{
  components:{
    'createbrand':createbrand,
    'indexbrand':indexbrand,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>