<template>
  <div class="tab-pane fade show active" id="productcategory" role="tabpanel">  
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product categories</h4> 
                  <p class="card-description">
                    This is the section you create and manage product categories.
                  </p>
                  <p>
                     If you have created or your product category already exists, you proceed to product subcategories.
                  </p>
                </div>
              </div>
            </div>

      </div>

  

      <div class="row">

          <indexcategory></indexcategory>
          <createcategory></createcategory>
      </div>
   

  </div>


</template>

<script type="text/javascript">
import axios from 'axios';
import createcategory from './create.vue';
import indexcategory from './index.vue';


export default{
  components:{
    'createcategory':createcategory,
    'indexcategory':indexcategory,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>