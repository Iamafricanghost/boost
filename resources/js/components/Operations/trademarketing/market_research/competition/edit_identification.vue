<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
      <div class="row g-3">
          <div class="col-md-6 col-lg-4 grid-margin stretch-card mx-auto mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update information</h4>
                <p class="card-description">
                  Competetitor information
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateCampaign" enctype="multipart/form-data">
                  
                        <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Competitor name" v-model="form.competitor_name">
                              <small class="text-danger" v-if="errors.competitor_name">{{ errors.competitor_name[0] }}</small>
                          </div>
                            
  
                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.campaign_id">
                                <option>Select the campaign</option>
                                <option :value="campaign.id" v-for="campaign in campaigns">{{campaign.campaign_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.campaign_id">{{ errors.campaign_id[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <textarea type="text" class="form-control"  placeholder="Enter description of criteria used" v-model="form.competitor_brief" rows="5"></textarea>
                              <small class="text-danger" v-if="errors.competitor_brief">{{ errors.competitor_brief[0] }}</small>
                          </div>
                   

  
  
                      <button type="submit" class="btn btn-primary me-2">Update competitor</button>

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
            competitor_name:'',
            campaign_id:'',
            competitor_brief:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          campaigns:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-tmcompetitor/'+id)
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
    updateCampaign(){
          let id = this.$route.params.id
          axios.put('/api/update-tmcompetitor/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'tm-market-research'}) 
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