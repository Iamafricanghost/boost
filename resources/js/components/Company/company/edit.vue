<template>
  <div class="content-wrapper">
    <nestednav v-if="this.userRole === 'admin'"></nestednav> 
<div class="row" v-if="this.userRole === 'admin'">
   
      <div class="row g-3" >
          <div class="col-md-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update employee Information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateCompany" enctype="multipart/form-data">
                  <div class="col-md-12">
                          <select class="form-select form-control" aria-label="Default select example" v-model="form.country_id">
                            <option selected>Select country</option>
                            <option :value="country.id" v-for="country in countries">{{country.country_name}}</option>
                          </select>
                            <small class="text-danger" v-if="errors.country_id">{{ errors.country_id[0] }}</small>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="company_name" placeholder="Company name" v-model="form.company_name">
                            <small class="text-danger" v-if="errors.company_name">{{ errors.company_name[0] }}</small>
                        </div>
                        <div class="col-md-12">
                          <select class="form-select form-control" aria-label="Default select example" v-model="form.legal_type">
                            <option selected>Select type</option>
                            <option value="partnership">Partnership</option>
                            <option value="corporation">Corporation</option>
                            <option value="sole_proprietorship">Sole proprietorship</option>
                          </select>
                            <small class="text-danger" v-if="errors.legal_type">{{ errors.legal_type[0] }}</small>
                        </div>
                        <div class="col-md-12">
                            <input type="email" class="form-control" id="company_email" placeholder="Email" v-model="form.company_email">
                            <small class="text-danger" v-if="errors.company_email">{{ errors.company_email[0] }}</small>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" id="company_phone" placeholder="Phone" v-model="form.company_phone">
                            <small class="text-danger" v-if="errors.company_phone">{{ errors.company_phone[0] }}</small>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="tin" placeholder="Tax identification number" v-model="form.tin">
                            <small class="text-danger" v-if="errors.tin">{{ errors.tin[0] }}</small>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="address" placeholder="Physical address" v-model="form.address">
                            <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                        </div>

                        <div class="col-md-12">
                            <input type="file" class="form-control" @change="onFileSelected">
                        </div>

                        <div class="col-md-12">
                            <img :src="form.photo" alt="" style="height: 40px; width: 40px;">
                        </div>

                  

                  <button type="submit" class="btn btn-primary me-2">Update Company</button>

                </form>
              </div>
            </div>
          </div>
        </div>
        
  </div>
  <not_permitted v-else></not_permitted> 
  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import not_permitted from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/not_permitted.vue';


export default{
  components:{
    'nestednav':nestednav,
    'not_permitted':not_permitted,
  },
  beforeCreate(){
    axios.get('/api/country/')
    .then(({data}) => (this.countries = data))
  },
  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
          country_id:'',
          company_name:'',
          legal_type:'',
          company_email:'',
          company_phone:'',
          tin:'',
          address:'',
          photo:'',
          newphoto:'',
      },
      errors:{},
      countries:[],
      userRole: localStorage.getItem('role')
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-company/'+id)
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
    updateCompany(){
          let id = this.$route.params.id
          axios.put('/api/update-company/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'company'})
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