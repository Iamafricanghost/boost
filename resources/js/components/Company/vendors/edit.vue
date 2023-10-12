<template>
  <div class="content-wrapper">
    <nestednav></nestednav> 
      <div class="row g-3">
          <div class="col-md-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update item</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateItem" enctype="multipart/form-data">
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Customer name" v-model="form.vendor_name">
                              <small class="text-danger" v-if="errors.vendor_name">{{ errors.vendor_name[0] }}</small>
                          </div>
                        
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Type of service e.g. photograghy" v-model="form.service_type">
                              <small class="text-danger" v-if="errors.service_type">{{ errors.service_type[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Office address" v-model="form.office_address">
                              <small class="text-danger" v-if="errors.office_address">{{ errors.office_address[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Contact name" v-model="form.contact_name">
                              <small class="text-danger" v-if="errors.contact_name">{{ errors.contact_name[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Contact level e.g. manager" v-model="form.contact_level">
                              <small class="text-danger" v-if="errors.contact_level">{{ errors.contact_level[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Contact phone" v-model="form.contact_phone">
                              <small class="text-danger" v-if="errors.contact_phone">{{ errors.contact_phone[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <input type="email" class="form-control"  placeholder="Contact email" v-model="form.contact_email">
                              <small class="text-danger" v-if="errors.contact_email">{{ errors.contact_email[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Tax identification number" v-model="form.tin">
                              <small class="text-danger" v-if="errors.tin">{{ errors.tin[0] }}</small>
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
  beforeCreate(){
    axios.get('/api/employee/')
      .then(({data}) => (this.employees = data))
  },
  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
            vendor_name:'',
            office_address:'',
            service_type:'',
            contact_name:'',
            contact_level:'',
            contact_phone:'',
            contact_email:'',
            tin:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          employees:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-vendor/'+id)
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
          axios.put('/api/update-vendor/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'vendors'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
    
  }

}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>