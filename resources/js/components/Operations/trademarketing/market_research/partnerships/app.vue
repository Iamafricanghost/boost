<template>
  <div class="tab-pane fade show" id="partnerships" role="tabpanel">
      <div class="row">
        

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Partnerships and Collaborations</h4>
                  <p class="card-description">
                    Identify any partnerships or collaborations your competitor has formed with other brands, organizations, or influencers. Determine if there are opportunities for you to create more impactful collaborations.
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