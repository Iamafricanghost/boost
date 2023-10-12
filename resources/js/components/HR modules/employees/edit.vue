<template>
  <div class="content-wrapper">
    <nestednav v-if="this.userRole === 'admin'"></nestednav> 
      <div class="row g-3" v-if="this.userRole === 'admin'">
          <div class="col-md-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update employee information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateEmployee" enctype="multipart/form-data">
                  
                      <div class="col-md-6">
                            <input type="text" class="form-control" id="name" placeholder="Name" v-model="form.name">
                        
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" placeholder="Email" v-model="form.email">
                            
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="Phone" placeholder="Phone" v-model="form.phone">
                            
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="id_number" placeholder="ID/Passport number" v-model="form.id_number">
                            
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="salary" placeholder="Salary" v-model="form.salary">
                            
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="residence" placeholder="Residential address" v-model="form.residence">
                            
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" id="Residential address" placeholder="Joining date" v-model="form.joining_date">
                            
                        </div>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="photo" placeholder="Photo" @change="onFileSelected">
                        </div>

                        <div class="col-md-6">
                            <img :src="form.photo" alt="" style="height: 40px; width: 40px;">
                        </div>
  
                      <button type="submit" class="btn btn-primary me-2">Update employee</button>

                </form>
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
          name:'',
          email:'',
          phone:'',
          id_number:'',
          salary:'',
          residence:'',
          photo:'',
          newphoto:'',
          userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          employees:{},
          userRole: localStorage.getItem('role')
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-employee/'+id)
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
    updateEmployee(){
          let id = this.$route.params.id
          axios.put('/api/update-employee/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'employee'}) 
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