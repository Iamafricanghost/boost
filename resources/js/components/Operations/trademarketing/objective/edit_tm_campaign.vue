<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
      <div class="row g-3">
          <div class="col-md-6 col-lg-4 grid-margin stretch-card mx-auto mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update campaign information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateCampaign" enctype="multipart/form-data">
                  
                  <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Campaign name" v-model="form.campaign_name">
                              <small class="text-danger" v-if="errors.campaign_name">{{ errors.campaign_name[0] }}</small>
                          </div>
                            
  
                          <div class="col-md-6">
                              <select class="form-select form-control"  v-model="form.customer_id">
                                <option selected>Select the customer</option>
                                <option :value="customer.id" v-for="customer in customers">{{customer.customer_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.customer_id">{{ errors.customer_id[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control"  v-model="form.campaign_lead">
                                <option selected>Select the campaign lead</option>
                                <option :value="employee.id" v-for="employee in employees">{{employee.name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.campaign_lead">{{ errors.campaign_lead[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <textarea type="text" class="form-control"  placeholder="Enter the campaign brief" v-model="form.campaign_brief" rows="5"></textarea>
                              <small class="text-danger" v-if="errors.campaign_brief">{{ errors.campaign_brief[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <label for="campaign_start">Campaign start</label>
                              <input type="date" class="form-control" id="campaign_start"  v-model="form.campaign_start">
                              <small class="text-danger" v-if="errors.campaign_start">{{ errors.campaign_start[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <label for="campaign_approx_end">Approx. end of campaign</label>
                              <input type="date" class="form-control" id="campaign_approx_end" v-model="form.campaign_approx_end">
                              <small class="text-danger" v-if="errors.campaign_approx_end">{{ errors.campaign_approx_end[0] }}</small>
                          </div>

  
  
                      <button type="submit" class="btn btn-primary me-2">Update campaign</button>

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
            campaign_brief:'',
            customer_id:'',
            campaign_lead:'',
            campaign_start:'',
            campaign_approx_end:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          customers:{},
          employees:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-tmcampaign/'+id)
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
          axios.put('/api/update-tmcampaign/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'tm-objectives'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
  },
  beforeCreate(){
    let id = localStorage.getItem('company_name')
        axios.get('/api/viewcustomers/'+id)
      .then(({data}) => (this.customers = data))

      axios.get('/api/viewemployees/'+id)
      .then(({data}) => (this.employees = data))
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>