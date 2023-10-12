<template>
  <div class="tab-pane fade show" id="tm_products" role="tabpanel">
      <div class="row">
        

        <div class="container">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Products</h4>
                  <p class="card-description">
                     Link an SKU to a project <span class="text-success">Click on the button to navigate to the product setup page</span>
                </p>
                    <div class="d-flex">
                    <product_setup class="me-3"></product_setup>
                    </div>
              </div>
            </div>
        </div>

        
      </div>

      <div class="row mt-5">
          <indexproducts></indexproducts>
          <createproduct></createproduct>
      </div>
  </div>


</template>

<script type="text/javascript">
import product_setup from './product_setup.vue';
import createproduct from './create_tm_product.vue';
import indexproducts from './index_tm_products.vue';

export default{
  components:{
    'product_setup':product_setup,
    'createproduct':createproduct,
    'indexproducts':indexproducts,
  },
}


    
</script>

<style type="text/css">


</style>