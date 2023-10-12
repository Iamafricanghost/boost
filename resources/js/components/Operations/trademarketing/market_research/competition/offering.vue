<template>
  <div class="tab-pane fade" id="offering" role="tabpanel">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Offering</h4> 
                  <p class="card-description">
                    Product offering
                  </p>
                  <p>
                    Understand what products your competitors offer. Identify the features, benefits, and unique selling points they emphasize. This will help you position your own offerings effectively.                  </p>
                </div>
              </div>
            </div>

      </div>

      <div class="row">
          <index></index>
          <create></create>
      </div>


    
  </div>


</template>

<script type="text/javascript">

import create from './create_offering.vue';
import index from './index_offering.vue';

export default{
  components:{
    'create':create,
    'index':index,
  },


}

    
</script>

<style type="text/css">


</style>