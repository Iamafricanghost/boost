<template>
  <div class="tab-pane fade show" id="kpis" role="tabpanel">
      <div class="row">
        

        <div class="container">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">KPI types</h4>
                  <p class="card-description">
                  Key performance indices | <span class="text-success">Click on any button to learn more on the specific KPI type</span>
                </p>
                    <div class="d-flex">
                    <brand_engagement class="me-3"></brand_engagement>
                    <lead_generation class="me-3"></lead_generation>
                    <instore_traffic class="me-3"></instore_traffic>
                    <sales_metrics class="me-3"></sales_metrics>
                    <brand_awareness class="me-3"></brand_awareness>
                    <data_collection class="me-3"></data_collection>
                    <geo_specific_metrics class="me-3"></geo_specific_metrics>
                    </div>
              </div>
            </div>
        </div>

        
      </div>

      <div class="row mt-5">
        <indexkpis></indexkpis>
          <createkpi></createkpi>
      </div>
  </div>


</template>

<script type="text/javascript">
import brand_engagement from './kpis_modals/brand_engagement.vue';
import brand_awareness from './kpis_modals/brand_awareness.vue';
import data_collection from './kpis_modals/data_collection.vue';
import geo_specific_metrics from './kpis_modals/geo_specific_metrics.vue';
import instore_traffic from './kpis_modals/instore_traffic.vue';
import lead_generation from './kpis_modals/lead_generation.vue';
import sales_metrics from './kpis_modals/sales_metrics.vue';
import createkpi from './create_tm_objective.vue';
import indexkpis from './index_tm_objectives.vue';

export default{
  components:{
    'brand_engagement':brand_engagement,
    'brand_awareness':brand_awareness,
    'data_collection':data_collection,
    'geo_specific_metrics':geo_specific_metrics,
    'instore_traffic':instore_traffic,
    'lead_generation':lead_generation,
    'sales_metrics':sales_metrics,
    'createkpi':createkpi,
    'indexkpis':indexkpis,
  },
}


    
</script>

<style type="text/css">


</style>