<template>
  <div class="tab-pane fade show" id="competitor_campaigns" role="tabpanel">
      <div class="row">
        

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Competitor's Recent BTL Campaigns:</h4>
                  <p class="card-description">
                    Analyze your competitor's recent BTL campaigns. Look at the tactics they used, the messaging they employed, and the outcomes they achieved. This will help you understand their current BTL approach and identify areas for differentiation
                  </p>
              </div>
            </div>
        </div>

        
      </div>

      <div class="row mt-5">
          <index></index>
          <create></create>
      </div>
  </div>


</template>


<script type="text/javascript">
import create from './create.vue';
import index from './index.vue';

export default{
  components:{
    'create':create,
    'index':index,
  },
}


    
</script>

<style type="text/css">


</style>