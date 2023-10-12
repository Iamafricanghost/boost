<template>
  <div class="col-md-4 grid-margin stretch-card mx-auto">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create lead</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createLead" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Lead name" v-model="form.lead_name">
                              <small class="text-danger" v-if="errors.lead_name">{{ errors.lead_name[0] }}</small>
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


                          <div class="col-md-6">
                          <select class="form-select form-control" aria-label="lead type" v-model="form.lead_type">
                            <option selected>Select lead type</option>
                            <option value="hot">Hot</option>
                            <option value="warm">warm</option>
                            <option value="cold">Cold</option>
                          </select>
                            <small class="text-danger" v-if="errors.lead_type">{{ errors.lead_type[0] }}</small>
                        </div>
  
                          <div class="col-md-6">
                            <select class="form-select form-control" aria-label="Default select example" v-model="form.employee_handling">
                              <option selected>Select your employee handling the lead</option>
                              <option :value="employee.id" v-for="employee in employees">{{employee.name}}</option>
                            </select>
                              <small class="text-danger" v-if="errors.employee_handling">{{ errors.employee_handling[0] }}</small>
                      </div>
  
  
                      <button type="submit" class="btn btn-primary me-2">Create lead</button>
  
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
            lead_name:'',
            office_address:'',
            contact_name:'',
            contact_level:'',
            contact_phone:'',
            contact_email:'',
            lead_type:'',
            employee_handling:'',
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
        //Method for inserting merchandiser details to the database
        createLead(){
              axios.post('/api/create-lead/',this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
      },
      created(){
        let id = localStorage.getItem('company_name')
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