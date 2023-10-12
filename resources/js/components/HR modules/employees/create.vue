<template>
  <div class="col-md-4 grid-margin stretch-card mx-auto">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add employee</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createEmployee" enctype="multipart/form-data" ref="form">
  
                      <div class="col-md-6">
                            <input type="text" class="form-control" id="name" placeholder="Name" v-model="form.name">
                            <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" placeholder="Email" v-model="form.email">
                            <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="Phone" placeholder="Phone" v-model="form.phone">
                            <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="id_number" placeholder="ID/Passport number" v-model="form.id_number">
                            <small class="text-danger" v-if="errors.id_number">{{ errors.id_number[0] }}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="salary" placeholder="Salary" v-model="form.salary">
                            <small class="text-danger" v-if="errors.salary">{{ errors.Salary[0] }}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="residence" placeholder="Residential address" v-model="form.residence">
                            <small class="text-danger" v-if="errors.residence">{{ errors.residence[0] }}</small>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" id="Residential address" placeholder="Joining date" v-model="form.joining_date">
                            <small class="text-danger" v-if="errors.joining_date">{{ errors.joining_date[0] }}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="photo" placeholder="Photo" @change="onFileSelected">
                        </div>

                        <div class="col-md-6">
                            <img :src="form.photo" alt="" style="height: 40px; width: 40px;">
                        </div>
                          
  
                      <button type="submit" class="btn btn-primary me-2">Create Employee</button>
  
                    </form>
                  </div>
                </div>
                </div>
    

  </template>
  
  <script type="text/javascript">
  
    export default{
  
      beforeCreate(){
        axios.get('/api/employee/')
      .then(({data}) => (this.employees = data))
      },
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
            name:'',
            email:'',
            phone:null,
            id_number:null,
            salary:null,
            residence:'',
            photo:'',
            joining_date:'',
            userName: localStorage.getItem('user'),
          },
          errors:{},
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
        //Method for inserting ambassador details to the database
        createEmployee(){
              axios.post('/api/create-employee/',this.form)
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