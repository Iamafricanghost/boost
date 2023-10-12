<template>
  <div class="tab-pane fade" id="target_audience" role="tabpanel">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Target audience</h4> 
                  <p class="card-description">
                    Competitor identification
                  </p>
                  <p>
                    Determine the demographics, behaviors, preferences, and pain points of your competitors' target audience. This will help you tailor your BTL strategies to meet the specific needs of the shared audience.                  </p>
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

import create from './create_target_audience.vue';
import index from './index_target_audience.vue';

export default{
  components:{
    'create':create,
    'index':index,
  },


}

    
</script>

<style type="text/css">


</style>