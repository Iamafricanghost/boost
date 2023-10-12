<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
    <div class="container">
      <div class="row g-3">
          <div class="col-md-12 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Client information</h4>
                <p class="card-description">
                  This is the information gathered from the customer. Click each tab to view details
                </p>

                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#campaigns" type="button" role="tab" >Campaigns</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#kpis" type="button" role="tab" >KPIs</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#tm_products" type="button" role="tab" >Products</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#tm_channels" type="button" role="tab" >Channels</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                          <campaigns></campaigns>
                          <kpis></kpis>
                          <tm_products></tm_products>
                          <tm_channels></tm_channels>

                        
                        
                      </div>
                                          
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script type="text/javascript">
import axios from 'axios'
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import campaigns from './campaigns.vue';
import kpis from './kpis.vue';
import tm_products from '../objective/products/products.vue';
import tm_channels from '../objective/channels/channels.vue';

export default{
  components:{
    'nestednav':nestednav,
    'campaigns':campaigns,
    'kpis':kpis,
    'tm_products':tm_products,
    'tm_channels':tm_channels,
  },

  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
            project_name:'',
            project_brief:'',
            customer_id:'',
            project_lead:'',
            userName: localStorage.getItem('user'),
          },
          errors:{},
          customers:{},
          employees:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-tmproject/'+id)
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
    updateProject(){
          let id = this.$route.params.id
          axios.put('/api/update-tmproject/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'trade-marketing'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
  },
  beforeCreate(){
    let id = localStorage.getItem('user')
        axios.get('/api/viewcustomers/'+id)
      .then(({data}) => (this.customers = data))

      axios.get('/api/viewemployees/'+id)
      .then(({data}) => (this.employees = data))
  },


}
</script>

<style type="text/css" scoped>

.content-wrapper {
  margin-top: 34px;
}


button:not(:disabled), [type="button"]:not(:disabled), [type="reset"]:not(:disabled), [type="submit"]:not(:disabled) {
    font-size: 12px;
}

</style>