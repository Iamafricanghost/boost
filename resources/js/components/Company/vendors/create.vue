<template>

  
  <div class="col-md-4 grid-margin stretch-card mx-auto">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create item</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    
                    <form class="forms-sample row g-3" @submit.prevent="createItem" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Vendor name" v-model="form.vendor_name">
                              <small class="text-danger" v-if="errors.vendor_name">{{ errors.vendor_name[0] }}</small>
                          </div>

                            
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Service e.g. photograghy" v-model="form.service_type">
                              <small class="text-danger" v-if="errors.service_type">{{ errors.service_type[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.country_id">
                                <option selected>Select a country</option>
                                <option :value="country.id" v-for="country in countries">{{country.country_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.country_id">{{ errors.country_id[0] }}</small>
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
  
  
                      <button type="submit" class="btn btn-primary me-2">Create Item</button>
  
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
            vendor_name:'',
            office_address:'',
            service_type:'',
            contact_name:'',
            contact_level:'',
            contact_phone:'',
            contact_email:'',
            tin:'',
            country_id:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          countries:[],
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
        createItem(){
              axios.post('/api/create-vendor/',this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
      },
      created(){
          axios.get('/api/country/')
          .then(({data})=>(this.countries = data))
          .catch()
      }

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