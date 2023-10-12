<template>
  <div class="col-md-4 grid-margin stretch-card mx-auto">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create role</h4>
                    <p class="card-description">
                      Role information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createRole" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Role name" v-model="form.role_name">
                              <small class="text-danger" v-if="errors.role_name">{{ errors.role_name[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create role</button>
  
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
  
      //           Reload.$on('AfterAdd',() =>{
      //   this.allItems();
      // });
  
  
      },
      data(){
        return {
          form: {
            role_name:'',
          },
          errors:{},
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
        createRole(){
              axios.post('/api/roles/',this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
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