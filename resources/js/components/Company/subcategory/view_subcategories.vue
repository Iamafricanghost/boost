<template>
  <div class="tab-pane fade" id="product_subcategories" role="tabpanel">  

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product subcategories</h4> 
                  <p class="card-description">
                    This is the section you create and manage product subcategories.
                  </p>
                  <p>
                     If you have created or your product subcategory already exists, you proceed to product brands.
                  </p>
                </div>
              </div>
            </div>

      </div>

      <div class="row"> 
          <indexsubcategory></indexsubcategory>
          <createsubcategory></createsubcategory>
      </div>

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import createsubcategory from './create.vue';
import indexsubcategory from './index.vue';


export default{
  components:{
    'createsubcategory':createsubcategory,
    'indexsubcategory':indexsubcategory,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>