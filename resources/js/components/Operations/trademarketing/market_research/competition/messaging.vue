<template>
  <div class="tab-pane fade" id="messaging" role="tabpanel">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Messaging</h4> 
                  <p class="card-description">
                    Messaging and Branding
                  </p>
                  <p>
                    Examine your competitors' messaging and branding strategies. What tone do they use? What emotions do they evoke? Identify gaps in messaging that you can leverage to your advantage
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

import create from './create_messaging.vue';
import index from './index_messaging.vue';

export default{
  components:{
    'create':create,
    'index':index,
  },


}

    
</script>

<style type="text/css">


</style>