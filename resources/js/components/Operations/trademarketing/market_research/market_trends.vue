<template>
  <div class="tab-pane fade" id="market_trends" role="tabpanel">
      <div class="row">

      </div>

                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#competitor_campaigns" type="button" role="tab" >Campaigns</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#approaches" type="button" role="tab" >Approaches</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#audience_engagement" type="button" role="tab" >Audience</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#social_media" type="button" role="tab" >Social</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#localized_marketing" type="button" role="tab" >Localized</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#community" type="button" role="tab" >Community</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#content_creation" type="button" role="tab" >Content</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#technology" type="button" role="tab" >Technology</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                          <competitor_campaigns></competitor_campaigns>
                          
                          
                      </div>
        </div>


</template>

<script type="text/javascript">

import competitor_campaigns from '../market_research/campaigns/app.vue';


export default{
  components:{
    'competitor_campaigns':competitor_campaigns,
  },
}


    
</script>

<style type="text/css" scoped>

.nav-link{
  font-size: 12px;
}


</style>