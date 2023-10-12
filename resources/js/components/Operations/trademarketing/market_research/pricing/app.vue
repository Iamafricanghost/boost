<template>
  <div class="tab-pane fade show" id="tm_pricing" role="tabpanel">
      <div class="row">
        

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Pricing strategies</h4>
                  <p class="card-description">
                    Analyze your competitors' pricing models. Are they positioned as premium, mid-range, or budget options? This will influence how you price and promote your offerings.
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