<template>
  <div class="col-md-4 grid-margin stretch-card mx-auto">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create trade marketing project</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createProject" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Project name" v-model="form.project_name">
                              <small class="text-danger" v-if="errors.project_name">{{ errors.project_name[0] }}</small>
                          </div>
                            
  
                          <div class="col-md-6">
                              <select class="form-select form-control"  v-model="form.customer_id">
                                <option selected>Select the customer</option>
                                <option :value="customer.id" v-for="customer in customers">{{customer.customer_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.customer_id">{{ errors.customer_id[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control"  v-model="form.project_lead">
                                <option selected>Select the project lead</option>
                                <option :value="employee.id" v-for="employee in employees">{{employee.name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.project_lead">{{ errors.project_lead[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Project brief" v-model="form.project_brief">
                              <small class="text-danger" v-if="errors.project_brief">{{ errors.project_brief[0] }}</small>
                          </div>
  
  
                      <button type="submit" class="btn btn-primary me-2">Create project</button>
  
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
        createProject(){
              axios.post('/api/create-tmproject/',this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
      },
      created(){
        let id = localStorage.getItem('user')
        axios.get('/api/viewcustomers/'+id)
      .then(({data}) => (this.customers = data))

      axios.get('/api/viewemployees/'+id)
      .then(({data}) => (this.employees = data))
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