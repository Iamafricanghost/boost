<template>
  <div class="content-wrapper" >
    <nestednav v-if="this.userRole === 'admin'"></nestednav > 
      <div class="row g-3" v-if="this.userRole === 'admin'">
          <div class="col-md-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update role information</h4>
                <p class="card-description">
                  Role information update
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updatePermission" enctype="multipart/form-data">
                  
                  <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="User name" v-model="form.name">
                              <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="email" class="form-control"  placeholder="User email" v-model="form.email">
                              <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="User phone" v-model="form.phone">
                              <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <select class="form-select form-control" v-model="form.status">
                                <option selected>Choose user status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                              </select>
                              <small class="text-danger" v-if="errors.status">{{ errors.status[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="password" class="form-control" id="password" placeholder="Password" v-model="form.password">
                              <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                          </div>
                          <div class="col-md-12">
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" v-model="form.password_confirmation">
                          </div>
  


                      <button type="submit" class="btn btn-primary me-2 btn-sm">Update user</button>

                </form>
              </div>
            </div>
          </div>
        </div>

        <not_permitted v-else></not_permitted> 
  </div>
</template>

<script type="text/javascript">
import axios from 'axios'
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import not_permitted from '../not_permitted.vue';


export default{
  components:{
    'nestednav':nestednav,
    'not_permitted':not_permitted,
  },
  beforeCreate(){
    axios.get('/api/roles/')
      .then(({data}) => (this.roles = data))
      .catch(console.log('error'))
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
            company_name:'',
            company_reg:'',
            role:'',
            status:'',
            password:null,
            confirm_password:null,
            
          },
          userRole: localStorage.getItem('role'),
          errors:{},
          roles:[],
    }
  },
  created(){
    let id = this.$route.params.id
      axios.get('/api/edit-permission/'+id)
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
    updatePermission(){
          let id = this.$route.params.id
          axios.put('/api/update-permission/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'permissions'})
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