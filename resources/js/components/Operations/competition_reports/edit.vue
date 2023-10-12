<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
    <div class="container">
      <div class="row g-3">
          <div class="col-md-12 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Competition information</h4>
                <p class="card-description">
                  Click each tab to view details
                </p>

                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#product_assortment" type="button" role="tab" >Product Assortment</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#pricing" type="button" role="tab" >Pricing</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#promotions" type="button" role="tab">Promotions</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#packaging" type="button" role="tab" >Packaging</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#merchandising_tactics" type="button" role="tab" >Merchandising tactics</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#product_placement" type="button" role="tab">Product Placement</button>
                          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#distribution_strategies" type="button" role="tab" >Distribution Strategies</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                          <product_assortment></product_assortment>
                          <pricing></pricing>
                          <promotions></promotions>
                          <packaging></packaging>
                          <merchandising_tactics></merchandising_tactics>
                          <product_placement></product_placement>
                          <distribution_strategies></distribution_strategies>

                        
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" >contact</div>
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
import product_assortment from './components/product_assortment.vue';
import pricing from './components/pricing.vue';
import promotions from './components/promotions.vue';
import packaging from './components/packaging.vue';
import merchandising_tactics from './components/merchandising_tactics.vue';
import product_placement from './components/product_placement.vue';
import distribution_strategies from './components/distribution_strategies.vue';

export default{
  components:{
    'nestednav':nestednav,
    'product_assortment':product_assortment,
    'pricing':pricing,
    'promotions':promotions,
    'packaging':packaging,
    'merchandising_tactics':merchandising_tactics,
    'product_placement':product_placement,
    'distribution_strategies':distribution_strategies,
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