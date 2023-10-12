<template>
  <div class="content-wrapper">
    <div class="row">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                  <!-- <li class="breadcrumb-item"><router-link to="/organ-assign">Assign</router-link></li> -->
                  <li class="breadcrumb-item" @click="$router.go(-1)">Back</li>
              </ol>
           </nav>
      </div>
      <div class="row g-3">
          <div class="col-md-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update project information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateProject" enctype="multipart/form-data">
                  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Project name" v-model="form.project_name">
                              <small class="text-danger" v-if="errors.project_name">{{ errors.project_name[0] }}</small>
                          </div>
                            
                          <div class="col-md-6">
                              <select class="form-select form-control" v-model="form.project_type">
                                <option selected>Select the project type</option>
                                <option value="merchadising" >Merchandising</option>
                                <option value="distribution" >Distribution</option>
                              </select>
                                <small class="text-danger" v-if="errors.project_type">{{ errors.project_type[0] }}</small>
                          </div>
  
                          <div class="col-md-6">
                              <select class="form-select form-control"  v-model="form.customer_id">
                                <option selected>Select the customer</option>
                                <option :value="customer.id" v-for="customer in customers">{{customer.customer_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.customer_id">{{ errors.customer_id[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control"  v-model="form.lead_id">
                                <option selected>Select the project lead</option>
                                <option :value="employee.id" v-for="employee in employees">{{employee.name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.lead_id">{{ errors.lead_id[0] }}</small>
                          </div>
  

  
  
                      <button type="submit" class="btn btn-primary me-2">Update customer</button>

                </form>
              </div>
            </div>
          </div>
        </div>
  </div>
</template>

<script type="text/javascript">
import axios from 'axios'


export default{

  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
            project_name:'',
            project_type:'',
            customer_id:'',
            lead_id:'',
            userName: localStorage.getItem('user'),
          },
          errors:{},
          customers:{},
          employees:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-project/'+id)
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
          axios.put('/api/update-project/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'projects'}) 
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

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>