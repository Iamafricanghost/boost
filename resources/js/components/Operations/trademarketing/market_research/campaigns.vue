<template>
  <div class="tab-pane fade show active" id="campaigns" role="tabpanel">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Campaigns</h4> 
                  <p class="card-description">
                    Client information
                  </p>
                  <p>
                    Campaigns would otherwise be referred to as projects. Use this section to create new trade marketing campaigns after LOE with client
                  </p>
                </div>
              </div>
            </div>

      </div>

      <div class="row">
          <indexcampaign></indexcampaign>
          <createcampaign></createcampaign>
      </div>


    
  </div>


</template>

<script type="text/javascript">

import createcampaign from './create_tm_campaign.vue';
import indexcampaign from './index_tm_campaigns.vue';

export default{
  components:{
    'createcampaign':createcampaign,
    'indexcampaign':indexcampaign,
  },


}

    
</script>

<style type="text/css">


</style>