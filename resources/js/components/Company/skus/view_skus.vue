<template>
    <div class="tab-pane fade" id="product_skus" role="tabpanel">

      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product skus</h4> 
                  <p class="card-description">
                    This is the section you create and manage product skus.
                  </p>
                  <p>
                     This is the lowest level of a product. Examples can be size such as Kg or Litre
                  </p>
                </div>
              </div>
            </div>

      </div>


      <div class="row">
          <indexsku></indexsku>
          <createsku></createsku>
      </div>

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createsku from './create.vue';
import indexsku from './index.vue';


export default{
  components:{
    'createsku':createsku,
    'indexsku':indexsku,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>