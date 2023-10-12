<template>
  <div class="tab-pane fade" id="research_distribution" role="tabpanel">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Distribution</h4> 
                  <p class="card-description">
                    Distribution Channels
                  </p>
                  <p>
                    Understand where and how your competitors distribute their products/services. This can help you identify opportunities to reach the same audience through different or more effective channels.
                  </p>
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

import create from './create_market_distribution.vue';
import index from './index_market_distribution.vue';

export default{
  components:{
    'create':create,
    'index':index,
  },


}

    
</script>

<style type="text/css">


</style>