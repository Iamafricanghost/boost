<template>
  <div class="content-wrapper">
      <nestednav></nestednav>
      
    <div class="container">
      <div class="row mx-auto">

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Competition</h4>
                      <div class="media">
                      <i class="ti-layout-media-right icon-sm text-success d-flex align-self-center me-3"></i>
                      <div class="media-body">
                        <p class="card-text">Outshine rivals via pricing, promotions, and impactful displays. Win customers through retail strategies</p>
                      </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-competition-report" class="btn btn-sm btn-success form-control">Reports</router-link>
                      
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Expiries</h4>
                      <div class="media">
                        <i class="ti-layout-media-left icon-sm text-danger d-flex align-self-center me-3"></i>
                        <div class="media-body">
                          <p class="card-text">Manage product shelf life. Avoid wastage. Optimize inventory. Ensure fresh products for consumers.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-expiries-report" class="btn btn-sm btn-danger form-control">Reports</router-link>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Onshelf availability</h4>
                      <div class="media">
                        <i class="ti-layout-list-post icon-sm text-warning d-flex align-self-center me-3"></i>
                        <div class="media-body">
                          <p class="card-text">Ensure products are readily stocked on shelves, meeting demand, enhancing consumer satisfaction.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-onshelfavailability-report" class="btn btn-sm btn-warning form-control">Report</router-link>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Share of shelf</h4>
                      <div class="media">
                        <i class="ti-loop icon-sm text-info d-flex align-self-center me-3"></i>
                        <div class="media-body">
                          <p class="card-text">Measure of product space on shelves. Maximize visibility. Impact consumer choice and sales.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-shareofshelf-report" class="btn btn-sm btn-info form-control">Report</router-link>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Planogram</h4>
                      <div class="media">
                        <i class="ti-layout-list-thumb icon-sm text-primary d-flex align-self-center me-3"></i>
                        <div class="media-body">
                          <p class="card-text"> Visual store layout plan. Optimize product placement, enhance shopper experience, boost sales</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-planogram-report" class="btn btn-sm btn-primary form-control">View</router-link>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                <h4 class="card-title">Shelf standard</h4>
                <div class="media">
                <i class="ti-layout-cta-btn-left icon-sm text-success d-flex align-self-center me-3"></i>
                <div class="media-body">
                  <p class="card-text">Guideline for product display. Ensures consistency, brand alignment, and appealing visuals.</p>
                </div>
                </div>
                </div>
                <div class="card-footer">
                <router-link to="/view-shelfstandard-report" class="btn btn-sm btn-success form-control">Report</router-link>
                </div>
                </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Feedback</h4>
                      <div class="media">
                        <i class="ti-view-list-alt icon-sm text-danger d-flex align-self-center me-3"></i>
                        <div class="media-body">
                          <p class="card-text">Collect consumer opinions, preferences, and insights. Enhance strategies, refine offerings, build loyalty.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-feedback-report" class="btn btn-sm btn-danger form-control">Report</router-link>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Price compliance</h4>
                      <div class="media">
                        <i class="ti-layout-slider icon-sm text-warning d-flex align-self-center me-3"></i>
                        <div class="media-body">
                          <p class="card-text">Ensuring consistent product pricing across retail outlets. Upholds brand integrity and customer trust. </p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-pricecompliance-report" class="btn btn-sm btn-warning form-control">Report</router-link>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">POSMs</h4>
                      <div class="media">
                        <i class="ti-view-list icon-sm text-info d-flex align-self-center me-3"></i>
                        <div class="media-body">
                          <p class="card-text">Displays, posters, signs at retail. Amplify brand, engage consumers, drive sales.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-posms-report" class="btn btn-sm btn-info form-control">Report</router-link>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Visibility</h4>
                      <div class="media">
                        <i class="ti-layout-accordion-list icon-sm text-primary d-flex align-self-center me-3"></i>
                        <div class="media-body">
                          <p class="card-text">Products stand out on shelves, attracting consumers' attention. Boosts brand recognition and sales.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <router-link to="/view-visibility-report" class="btn btn-sm btn-primary form-control">Report</router-link>
                    </div>
                  </div>
                </div>




</div>
    </div>
      

  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
// import indexproject from './index.vue';


export default{
  components:{
    'nestednav':nestednav,
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>