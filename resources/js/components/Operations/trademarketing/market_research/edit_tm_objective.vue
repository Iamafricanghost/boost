<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
      <div class="row g-3">
          <div class="col-md-6 col-lg-4 grid-margin stretch-card mx-auto mt-5">
            <div class="card">
              <div class="card-body"> 
                <h4 class="card-title">Update objective information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                    
                <form class="forms-sample row g-3" @submit.prevent="updateObjective" enctype="multipart/form-data" ref="form">
  
                        <div class="col-md-6">
                            <select class="form-select form-control"  v-model="form.campaign_id">
                              <option>Select the campaign</option>
                              <option :value="campaign.id" v-for="campaign in campaigns">{{campaign.campaign_name}}</option>
                            </select>
                              <small class="text-danger" v-if="errors.campaign_id">{{ errors.campaign_id[0] }}</small>
                        </div>

                        <div class="col-md-6">
                            <select class="form-select form-control"  v-model="form.kpi_type">
                              <option>Select the Kpi type</option>
                              <option value="brand_engagement">Brand engagement</option>
                              <option value="lead_generation">Lead generation</option>
                              <option value="in-store_traffic">Instore traffic</option>
                              <option value="sales_metrics">Sales Metrics</option>
                              <option value="brand_awareness">Brand awareness</option>
                              <option value="data_collection">Data collection</option>
                              <option value="geo_specific_metrics">Geo specific metrics</option>
                            </select>
                              <small class="text-danger" v-if="errors.kpi_type">{{ errors.kpi_type[0] }}</small>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control"  placeholder="Objective" v-model="form.objective">
                            <small class="text-danger" v-if="errors.objective">{{ errors.objective[0] }}</small>
                        </div>


                        <div class="col-md-12">
                            <textarea type="text" class="form-control"  placeholder="Enter the description of the objective" v-model="form.description" rows="5"></textarea>
                            <small class="text-danger" v-if="errors.description">{{ errors.description[0] }}</small>
                        </div>

                      <button type="submit" class="btn btn-primary me-2">Update objective</button>

                </form>
              </div>
            </div>
          </div>
        </div>
  </div>
</template>

<script type="text/javascript">
import axios from 'axios'
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';


export default{
  components:{
    'nestednav':nestednav,
  },

  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
            campaign_name:'',
            kpi_type:'',
            objective:'',
            description:'',
          },
          errors:{},
          campaigns:{},
          employees:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-tmobjective/'+id)
      .then(({data}) => (this.form = data))
      .catch(console.log('error'))
  },
  methods:{
    onFileSelected(event){
        let file = event.target.files[0];
        if(file.size > 1048770){
          Notification.image_validation()
        }else{
          let reader = new FileReader();
          reader.onload = event =>{
            this.form.newphoto = event.target.result
          };
          reader.readAsDataURL(file);
        }
    },
    //Method for inserting employee details to the database
    updateObjective(){
          let id = this.$route.params.id
          axios.put('/api/update-tmobjective/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'tm-objectives'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
  },
  beforeCreate(){
    let id = localStorage.getItem('company_name')
        axios.get('/api/viewtmcampaign/'+id)
      .then(({data}) => (this.campaigns = data))
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>