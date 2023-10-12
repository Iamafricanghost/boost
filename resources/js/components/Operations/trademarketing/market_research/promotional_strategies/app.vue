<template>
  <div class="tab-pane fade show" id="promotional_strategy" role="tabpanel">
      <div class="row">
        

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Promotional strategies</h4>
                  <p class="card-description">
                    Study the BTL marketing tactics your competitors are using. Are they focusing on events, influencer partnerships, direct mail, loyalty programs, etc.? This will help you devise strategies that stand out.                </p>
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