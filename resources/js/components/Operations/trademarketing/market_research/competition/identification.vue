<template>
  <div class="tab-pane fade show active" id="identification" role="tabpanel">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Identification</h4> 
                  <p class="card-description">
                    Competitor identification
                  </p>
                  <p>
                    Identify the main competitors in your industry or niche. This might include both direct competitors offering similar products/services and indirect competitors addressing similar customer need
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

import create from './create_identification.vue';
import index from './index_identification.vue';

export default{
  components:{
    'create':create,
    'index':index,
  },


}

    
</script>

<style type="text/css">


</style>