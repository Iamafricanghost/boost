<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
      <div class="row g-3">
          <div class="col-md-6 col-lg-4 grid-margin stretch-card mx-auto mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update item</h4>
                <p class="card-description">
                  Basic information
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateItem" enctype="multipart/form-data">
                  
  
                    <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Demographic e.g women/men" v-model="form.demographic">
                              <small class="text-danger" v-if="errors.demographic">{{ errors.demographic[0] }}</small>
                          </div>
                            
                            
                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.sku_id">
                                <option>Select the competitor sku</option>
                                <option :value="sku.id" v-for="sku in skus">{{sku.sku_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.sku_id">{{ errors.sku_id[0] }}</small>
                          </div>
  


                          <div class="col-md-12">
                              <textarea type="text" class="form-control"  placeholder="Enter preference and pain points of demographic mentioned" v-model="form.preference" rows="5"></textarea>
                              <small class="text-danger" v-if="errors.preference">{{ errors.preference[0] }}</small>
                          </div>
                   

  
  
                      <button type="submit" class="btn btn-primary me-2">Update item</button>

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
            demographic:'',
            sku_id:'',
            preference:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          competitors:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-tmaudience/'+id)
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
          axios.put('/api/update-tmaudience/'+id,this.form)
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