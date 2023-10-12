<template>
  <div class="tab-pane fade show active" id="competition" role="tabpanel">
      <div class="row">

      </div>

                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#identification" type="button" role="tab" >Identification</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#offering" type="button" role="tab" >Offerings</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#target_audience" type="button" role="tab" >Audience</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#positioning" type="button" role="tab" >Positioning</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#messaging" type="button" role="tab" >Messaging</button>
                          <!-- <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#research_distribution" type="button" role="tab" >Distribution</button> -->
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#tm_pricing" type="button" role="tab" >Pricing</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#promotional_strategy" type="button" role="tab" >Strategy</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#partnerships" type="button" role="tab" >Partnerships</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                          <identification></identification>
                          <offering></offering>
                          <target_audience></target_audience>
                          <positioning></positioning>
                          <messaging></messaging>
                          <!-- <distribution></distribution> -->
                          <pricing></pricing>
                          <promotional_strategy></promotional_strategy>
                          <partnerships></partnerships>
                      </div>
        </div>


</template>

<script type="text/javascript">

import identification from '../market_research/competition/identification.vue';
import offering from '../market_research/competition/offering.vue';
import target_audience from '../market_research/competition/target_audience.vue';
import positioning from '../market_research/competition/positioning.vue';
import messaging from '../market_research/competition/messaging.vue';
import distribution from '../market_research/competition/distribution.vue';
import pricing from '../market_research/pricing/app.vue';
import promotional_strategy from '../market_research/promotional_strategies/app.vue';
import partnerships from '../market_research/partnerships/app.vue';


export default{
  components:{
    'identification':identification,
    'offering':offering,
    'target_audience':target_audience,
    'positioning':positioning,
    'messaging':messaging,
    'distribution':distribution,
    'pricing':pricing,
    'promotional_strategy':promotional_strategy,
    'partnerships':partnerships,
  },
}


    
</script>

<style type="text/css" scoped>

.nav-link{
  font-size: 12px;
}


</style>