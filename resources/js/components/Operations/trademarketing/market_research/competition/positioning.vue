<template>
  <div class="tab-pane fade" id="positioning" role="tabpanel">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Market Positioning</h4> 
                  <p class="card-description">
                    Product offering
                  </p>
                  <p>
                    Analyze how your competitors position themselves in the market. Are they focusing on premium quality, affordability, innovation, or something else? This will guide your efforts to differentiate your brand.
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

import create from './create_market_positioning.vue';
import index from './index_market_positioning.vue';

export default{
  components:{
    'create':create,
    'index':index,
  },


}

    
</script>

<style type="text/css">


</style>