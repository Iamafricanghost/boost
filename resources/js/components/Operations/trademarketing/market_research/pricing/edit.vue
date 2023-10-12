<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
      <div class="row g-3">
          <div class="col-md-6 col-lg-4 grid-margin stretch-card mx-auto mt-5">
            <div class="card">
              <div class="card-body"> 
                <h4 class="card-title">Update channel</h4>
                <p class="card-description">
                  Channel information
                </p>
                    
                <form class="forms-sample row g-3" @submit.prevent="updateItem" enctype="multipart/form-data" ref="form">
  
  
                            <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.sku_id">
                                <option>Select the competitor sku</option>
                                <option :value="sku.id" v-for="sku in skus">{{sku.sku_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.sku_id">{{ errors.sku_id[0] }}</small>
                          </div>
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Enter price" v-model="form.sku_price">
                              <small class="text-danger" v-if="errors.sku_price">{{ errors.sku_price[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.sku_strategy">
                                <option>Select the competitor strategy</option>
                                <option value="premium">Premium</option>
                                <option value="mid range">Mid range</option>
                                <option value="budget option">Budget option</option>
                              </select>
                                <small class="text-danger" v-if="errors.sku_id">{{ errors.sku_strategy[0] }}</small>
                          </div>

                          <button type="submit" class="btn btn-primary me-2 btn-sm">Update item</button>
  

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
            campaign_id:'',
            country_name:'',
            channel:'',
            channel_description:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          campaigns:{},
          skus:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-tmprice/'+id)
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
    updateItem(){
          let id = this.$route.params.id
          axios.put('/api/update-tmprice/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'tm-market-research'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
  },
  beforeCreate(){
         let id = localStorage.getItem('company_name')
        axios.get('/api/viewtmoffering/'+id)
      .then(({data}) => (this.skus = data))
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>