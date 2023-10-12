<template>
  <div class="col-md-4 grid-margin stretch-card mx-auto">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create user</h4>
                    <p class="card-description">
                      Enter user information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createPermission" enctype="multipart/form-data" ref="form">
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
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create user</button>
  
                    </form>
                  </div>
                </div>
              </div>
  </template>
  
  <script type="text/javascript">
  
    export default{
  

      created(){
  
          if(!User.loggedIn()){
            this.$router.push({name:'/'})
            
          }

          this.$refs.form.reset();

  
      //           Reload.$on('AfterAdd',() =>{
      //   this.allItems();
      // });
  
  
      },
      data(){
        return {
          form: {
            name:'',
            email:'',
            phone:'',
            company_name:localStorage.getItem('company_name'),
            company_reg: localStorage.getItem('company_reg'),
            role:'user',
            status:'',
            password:null,
            confirm_password:null
          },
          errors:{},
          roles:[],
        }
      },
      methods:{
        onFileSelected(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
              Notification.image_validation()
            }else{
              let reader = new FileReader();
              reader.onload = event =>{
                this.form.photo = event.target.result
                console.log(event.target.result);
              };
              reader.readAsDataURL(file);
            }
        },
        //Method for inserting merchandiser details to the database
        createPermission(){
            let id = localStorage.getItem('user_id')
              axios.post('/api/create-permission/'+id,this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
      },
      created(){ 
    
        axios.get('/api/roles/')
      .then(({data}) => (this.roles = data))
      .catch(console.log('error'))
      },
  
    }
  </script>
  
  <style type="text/css">
  select.form-control{
    color: black;
  }
  
  .content-wrapper {
      margin-top: 34px;
  }
  
  </style>