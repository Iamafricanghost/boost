<template>
  <div class="tab-pane fade show" id="tm_channels" role="tabpanel">
      <div class="row">
        

        <div class="container">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Channels</h4>
                  <p class="card-description">
                     Get an overall description from client <span class="text-success">Click on the button to learn more</span>
                </p>
                    <div class="d-flex">
                    <channel_setup class="me-3"></channel_setup>
                    </div>
              </div>
            </div>
        </div>

        
      </div>

      <div class="row mt-5">
          <indexproducts></indexproducts>
          <createproduct></createproduct>
      </div>
  </div>


</template>

<script type="text/javascript">
import channel_setup from './channel_setup.vue';
import createproduct from './create_tm_channel.vue';
import indexproducts from './index_tm_channel.vue';

export default{
  components:{
    'channel_setup':channel_setup,
    'createproduct':createproduct,
    'indexproducts':indexproducts,
  },
}


    
</script>

<style type="text/css">


</style>