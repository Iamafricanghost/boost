<template>
  <div class="tab-pane fade" id="product_variants" role="tabpanel">

<div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product variants</h4> 
                  <p class="card-description">
                    This is the section you create and manage product variants.
                  </p>
                  <p>
                     If you have created or your product variant already exists, you proceed to product skus.
                  </p>
                </div>
              </div>
            </div>

      </div>

      <div class="row">

        <indexvariant></indexvariant>
        <createvariant></createvariant>

      </div>

</div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createvariant from './create.vue';
import indexvariant from './index.vue';


export default{
  components:{
    'createvariant':createvariant,
    'indexvariant':indexvariant,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>